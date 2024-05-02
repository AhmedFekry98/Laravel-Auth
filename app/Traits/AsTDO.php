<?php

namespace App\Traits;

use App\TDO\TDO;

trait AsTDO
{

    public function asTDO()
    {
        return new TDO($this->validated());
    }

}