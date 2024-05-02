<?php

namespace Modules\Auth\Http\Controllers;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Enums\ErrorCode;
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



   
      $user = $this->registerService->register($request->asTDO());
      return $this->okResponse(
        $user,
        $message = __("messages.user_register")
      );

  }

  # Fanction Login
  public function login(LoginRequest $request)
  {
    $user =  $this->loginService->login($request);

    if (is_int($user) && $user === ErrorCode::INVALID_CREDENTIAL) {
      return $this->badResponse(
        $message = __('errorcode.' . $user )
      );
    }

    $deviceName = $request->post("device_name", $request->userAgent());
    $token = $user->createToken($deviceName)->plainTextToken;

    return $this->okResponse(
      [
        'token' => $token,
        'user' => $user
      ],
      $message = "loged in"
    );
  }

  # Function Logout
  public function logout(Request $request)
  {
    try {
      $user =  $this->logoutService->logout($request->user());
      return $this->okResponse(
        $user,
        $message = 'Success Logout'
      );
    } catch (\Exception $e) {
      return $this->badResponse(
        $message = $e
      );
    }
  }
}
