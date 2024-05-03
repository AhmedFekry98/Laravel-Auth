<?php

namespace App\Core;

abstract class Service
{
    protected function error($errorCode)
    {
        return new ServiceTDO(null, $errorCode);
    }

    protected function success($daata)
    {
        return new ServiceTDO($daata);
    }
}