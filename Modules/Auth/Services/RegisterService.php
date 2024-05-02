<?php

namespace Modules\Auth\Services;

use Modules\Auth\Enums\ErrorCode;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class RegisterService
{
    private static $model = User::class;

    private $username;
    private $password;

    private function filteringRequest($request)
    {
        
    }
  
    public function register(string $username , string $password) : User
    {
        try{
            $data = [
                'username' => $username,
                'password' => $password,
            ];
            $user = self::$model::create($data);
            return $user;
        }catch(\Throwable $e){
            return ErrorCode::UNSPCIFIED_ERROR;
        }

    }  

}