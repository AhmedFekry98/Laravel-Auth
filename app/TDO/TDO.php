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
  
        return data_get($this->data,$keys);
    }
    
    public function has($key)
    {
        return isset($this->data->$key);
    }

    public function asSnake()
    {
        return collect($this->data)->reduce(function($data,$value,$key){
            $data[str($key)->snake()] = $value;
        },[]);
    }

    public function all()
    {
        return $this->data;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

}