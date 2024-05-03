<?php

namespace App\Core;

use App\TDO\ServiceTDO;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Auth\Enums\ErrorCode;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class Service
{
    protected function error(ErrorCode $code): ServiceTDO
    {
        return new ServiceTDO(null, $code);
    }

    protected function success(mixed $daata): ServiceTDO
    {
        return new ServiceTDO($daata);
    }

    public function stop(mixed $daata): void
    {
        throw new HttpResponseException(
            response: response()->json($daata)
        );
    }
}