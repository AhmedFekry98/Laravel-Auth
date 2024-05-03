<?php

namespace Modules\Auth\Services;

use App\TDO\TDO;
use Modules\Auth\Enums\ErrorCode;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class RegisterService
{
    private static $model = User::class;

  
    public function register(TDO $tdo) 
    {
        try{
            $user = self::$model::create($tdo->all());
            return $user;
        }catch(\Throwable $e){
          return ErrorCode::INVALID_CREDENTIAL->name;
        }
    }  

}