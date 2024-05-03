<?php

namespace App\Core;

use App\TDO\ServiceTDO;
use Modules\Auth\Enums\ErrorCode;

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
}