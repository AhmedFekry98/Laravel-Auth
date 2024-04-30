<?php

namespace Modules\Auth\Services;

use Modules\Auth\Entities\User;

class LogoutService
{
    private static $models = User::class;
    
    public function logout(object $user)
    {
       return  $user->currentAccessToken()
        ->delete();
    }

}
