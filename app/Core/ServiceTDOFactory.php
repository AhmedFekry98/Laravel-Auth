<?php

namespace App\Core;

use App\TDO\ResultTDO;
use Illuminate\Http\Exceptions\HttpResponseException;
use Modules\Auth\Enums\ErrorCode;
use Symfony\Component\HttpKernel\Exception\HttpException;

abstract class ServiceTDOFactory
{
    protected function error(mixed $code): ResultTDO
    { 
        return new ResultTDO(null, $code);
    }

    protected function success(mixed $data): ResultTDO
    {
        return new ResultTDO($data);
    }

    public function stop(mixed $data): void
    {
        throw new HttpResponseException(
            response: response()->json($data)
        );
    }
}