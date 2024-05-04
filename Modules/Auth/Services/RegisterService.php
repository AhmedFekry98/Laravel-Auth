<?php

namespace Modules\Auth\Services;

use App\Core\Service;
use App\TDO\TDO;
use Modules\Auth\Enums\ErrorCode;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class RegisterService extends Service
{
    private static $model = User::class;

  
    public function register(TDO $tdo) 
    {
        try{
            $user = self::$model::create($tdo->all());
            return $user;
        }catch(\Throwable $e){
          return $this->error(ErrorCode::INVALID_CREDENTIAL);
        }
    }  

}