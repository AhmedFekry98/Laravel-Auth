<?php

namespace Modules\Auth\Http\Controllers;

use App\Facades\TDOFacade;
use App\TDO\TDO;
use App\Traits\ApiResponses;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Enums\ErrorCode;
use Modules\Auth\Http\Requests\CheckOtpRequest;
use Modules\Auth\Http\Requests\ForgotPasswordRequest;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Requests\RegisterRequest;
use Modules\Auth\Services\CheckOtpService;
use Modules\Auth\Services\ForgotPasswordService;
use Modules\Auth\Services\LoginService;
use Modules\Auth\Services\LogoutService;
use Modules\Auth\Services\RegisterService;
use PharIo\Manifest\Email;
use Psy\TabCompletion\Matcher\FunctionsMatcher;
use Psy\VersionUpdater\Checker;

class AuthController extends Controller
{
  use ApiResponses;


  public function __construct(
    private RegisterService $registerService,
    private LoginService $loginService,
    private LogoutService $logoutService,
    private ForgotPasswordService  $forgotPasswordService,
    private CheckOtpService   $CheckOtpService,

  ) {
  }

  # Function Register
  public function register(RegisterRequest $request)
  {
      $user = $this->registerService->register((TDOFacade::make($request)));
      
      if ($user->errorInfo ?? null) {
        return $this->badResponse(
          $message = __("error_messages.user_register")
        );
    }
      return $this->okResponse(
        $user,
        $message = __("success_messages.user_register")
      );

  }

  # Fanction Login
  public function login(LoginRequest $request)
  {
    $user =  $this->loginService->login((TDOFacade::make($request)));

    if ($user->errorInfo ?? null || !$user) {
      return $this->badResponse(
        $message = __("error_messages.user_login")
      );
  }
    $deviceName = $request->post("device_name", $request->userAgent());
    $token = $user->createToken($deviceName)->plainTextToken;
    return $this->okResponse(
      [
        'token' => $token,
        'user' => $user
      ],
      $message = __("success_messages.user_login")
    );
  }

  # Function Logout
  public function logout(Request $request)
  {
    
      $user =  $this->logoutService->logout($request->user());
      if($user){
        return $this->okResponse(
          $user,
          $message = __('success_messages.user_logout')
        );
      }

      return $this->badResponse(
        $message = __("error_messages.user_logout")
      );
  }

  # Function forgot-password
  public function forgotPassword(ForgotPasswordRequest $request)
  {
    $user = $this->forgotPasswordService->forgotPassword((TDOFacade::make($request)));
    if ($user->errorInfo ?? null || !$user) {
      return $this->badResponse(
        $message = __("error_messages.user_forgotpassword",[
          'email_otp_forgot' => $user,
        ])
      );
     }

    return $this->okResponse(
      $message = __('success_messages.user_forgotpassword',[
        'email_otp_forgot' => $user,
      ])
    );

  } 

  # Function check-otp
  public function checkOtp(CheckOtpRequest $request)
  {
    $otp = $this->CheckOtpService->checkOtp(TDOFacade::make($request));
    return $otp;
  }

  # reset-password
  public function resetPassword()
  {

  }  
  
  # change-password

  public function changePassword()
  {

  }


}
