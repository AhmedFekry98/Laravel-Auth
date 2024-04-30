<?php

namespace Modules\Auth\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\LoginService;
use Modules\Auth\Services\LogoutService;
use Modules\Auth\Services\RegisterService;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class AuthController extends Controller
{
   use ApiResponses;
   public function __construct(
    private RegisterService $registerService,
    private LoginService $loginService,
    private LogoutService $logoutService

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
        $user =  $this->loginService->login($request);
        return $this->okResponse(
            $user, $message = 'Success Login'
        );
    }catch(\Exception $e){
        return $this->badResponse(
             $message = $e 
        );
    }
  }

  # Function Logout
  public function logout(Request $request)
  {
    try{
      $user =  $this->logoutService->logout($request->user());
      return $this->okResponse(
          $user, $message = 'Success Logout'
        );
    }catch(\Exception $e){
        return $this->badResponse(
            $message = $e 
        );
    }
  }



}
