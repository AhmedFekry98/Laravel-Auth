<?php

namespace Modules\Auth\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\LoginService;
use Modules\Auth\Services\RegisterService;

class AuthController extends Controller
{
   use ApiResponses;
   public function __construct(
    private RegisterService $registerService,
    private LoginService $logInService,

  ) {
  }

  # Function Register
  public function register(RegisterRequest $request)
  {
    try{
        $user = $this->registerService->register($request);
        return $this->okResponse(
            $user, $message = 'User Registered Successfully'
        );
    }catch(\Exception $e){
        return $this->badResponse(
             $message = $e 
        );
    }
  }

  # Fanction Login
  public function login(LoginRequest $request)
  {
    try{
        $user =  $this->logInService->login($request);
        return $this->okResponse(
            $user, $message = 'Success Login'
        );
    }catch(\Exception $e){
        return $this->badResponse(
             $message = $e 
        );
    }
  }





}
