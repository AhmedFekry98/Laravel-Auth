<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;
use Modules\Auth\Enums\ErrorCode;
use Modules\Sanctum\Services\Users\UsersServiceFactory;

class LoginService
{
    private static $models = User::class;

    private $getBy  = 'username';


    public function login($request): User|int // return int value only if has error code
    {
        try {
            $validated = $request->validated();
            $user = self::$models::where($this->getBy, $validated[$this->getBy])->first();
        } catch (\Throwable $ex) {
            return ErrorCode::UNSPCIFIED_ERROR;
        }

        if ( !$user || !Hash::check($validated['password'], $user->password)) {
            return  ErrorCode::INVALID_CREDENTIAL;
        }

        return $user;
    }
}
