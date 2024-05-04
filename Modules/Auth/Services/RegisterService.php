<?php

namespace Modules\Auth\Services;

use App\Core\ServiceTDOFactory;
use App\TDO\TDO;

use Illuminate\Support\Facades\Hash;
use Modules\Auth\Entities\User;

class RegisterService
{
    private static $model = User::class;
    const INVALID_CREDENTIAL =  'invalid_credential';
  
    public function register(TDO $tdo) 
    {
        try{
            $data = $tdo->all();
            $data['password'] = Hash::make($data['password']);
            $user = self::$model::create($data);
            return $user;
        }catch(\Throwable $e){
            return $e;
        }
    }  




}