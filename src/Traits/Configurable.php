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

    public function __set($name, $value)
    {
        $method = "set" . ucfirst($name);
        if(method_exists($this, $method)){
            $this->{$method}($value);
        }else{
            $this->setProperty($name, $value);
        }
    }

    protected function setProperty($name, $value){
        if(property_exists(static::class, $name)){
            $this->{$name} = $value;
        }else{
            throw new \Exception("attribute not allowed");
        }
    }

    protected function getProperty($name){
        if(property_exists(static::class, $name)){
            return $this->{$name};
        }else{
            throw new \Exception("attribute not allowed");
        }
    }

    public function __get($name)
    {
        $method = "get" . ucfirst($name);
        if(method_exists($this, $method)){
            return $this->{$method}($name);
        }else{
            return $this->getProperty($name);
        }
    }
}