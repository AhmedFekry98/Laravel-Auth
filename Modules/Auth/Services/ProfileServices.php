<?php


namespace  Modules\Auth\Services;

use App\TDO\TDO;
use Illuminate\Support\Facades\Auth;

class ProfileServices
{
    # to get All user
    public function getAll()
    {

    }

    # to get user profile
    public function getOne()
    {
        try{
            $profile = Auth::user();
            return $profile;
        }catch(\Throwable $e){
            return $e;
        }

    }

    # update user profile
    public function update(TDO $tdo)
    {
        try{
            $user = Auth::user();
            $profile = $user->update($tdo->all());
            return $this->getOne();
        }catch(\Throwable $e){
            return $e;
        }

    }


    
}