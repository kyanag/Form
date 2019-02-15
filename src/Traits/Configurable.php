<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 14:22
 */

namespace Kyanag\Form\Traits;


trait Configurable
{

    public function isProperty($name){
        return true;
    }

    public function __set($name, $value)
    {
        $method = "set" . ucfirst($name);
        if(method_exists($this, $method)){
            $this->{$method}($value);
        }else if($this->isProperty($name)){
            $this->{$name} = $value;
        }else{
            throw new \RuntimeException("attribute not allowed");
        }
    }

    public function __get($name)
    {
        $method = "get" . ucfirst($name);
        if(method_exists($this, $method)){
            return $this->{$method}($name);
        }else if($this->isProperty($name)){
            return $this->{$name};
        }else{
            throw new \RuntimeException("attribute not allowed");
        }
    }
}