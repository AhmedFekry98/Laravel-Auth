<?php

namespace App\TDO;

class TDO 
{
  
    public function __construct(
        protected $data
    )
    {}

    public function toArray()
    {
        return $this->data;
    }

    public function get($keys)
    {
        return data_get($keys,$this->data);
    }

}