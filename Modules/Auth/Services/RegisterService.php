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
        $user = self::$model::create($tdo->all());
        return $user;
    }  

}