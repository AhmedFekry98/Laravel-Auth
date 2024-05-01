<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;
use Modules\Sanctum\Services\Users\UsersServiceFactory;

class LoginService
{
    private static $models = User::class;
    
    private $getBy  = 'username';
    

    public function login($request)
    {
        $validated = $request->validated();
        $user = self::$models::where($this->getBy,$validated[$this->getBy])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            $deviceName = $request->post("device_name", $request->userAgent());
            $user['token'] = $user->createToken($deviceName)->plainTextToken;
            return $user;
        }
        throw new \RuntimeException('Invalid Information');
    }

}
