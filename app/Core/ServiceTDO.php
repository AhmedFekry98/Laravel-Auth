<?php

namespace App\Core;

class ServiceTDO
{
    public function __construct(
        protected mixed $data = null,
        protected $code = null
    ) {
    }

    public function isError(): bool
    {
        return $this->code && $this->data == null
            ? true
            : false;
    }

    public function getErrorMessage(): string
    {
        return __('messages.' . $this->code->name);
    }
}
