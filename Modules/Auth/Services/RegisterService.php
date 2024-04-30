<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class RegisterService
{
    private static $model = User::class;

    public function register($request)
    {
       
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $user = self::$model::create($validated);
        return $user;
    } 

}