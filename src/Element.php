<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/11
 * Time: 15:21
 */

namespace Kyanag\Form;


use Kyanag\Form\Traits\Configurable;

abstract class Element
{

    use Configurable;

    protected $_attributes = [];

    public function __set($name, $value)
    {
        $method = "set" . ucfirst($name);
        if(method_exists($this, $method)){
            $this->{$method}($value);
        }else if($this->isProperty($name)){
            $this->_attributes[$name] = $value;
        }else{
            throw new \RuntimeException("attribute not allowed");
        }
    }

    public function __get($name)
    {
        return isset($this->_attributes[$name]) ? $this->_attributes[$name] : null;
    }

    /**
     * @return string
     */
    abstract public function render();

    protected function renderAttributes($attributes = null){
        $attributes = $attributes ?: $this->getAttributes();

        $items = [];
        foreach($attributes as $name => $value){
            $items[] = $this->renderAttr($name, $value);
        }
        return implode(" ", $items);
    }

    protected function renderAttr($name, $value){
        if($name == "data"){
            $items = [];
            foreach($value as $name => $val){
                $items[] = $this->renderAttr("data-{$name}", $val);
            }
            return implode(" ", $items);
        }else if(is_bool($value)){
            return $value === true ? $name : "";
        }else if(is_array($value)){
            $str = implode(" ", $value);
            return "{$name}='{$str}'";
        }else{
            return "{$name}='{$value}'";
        }
    }

    protected function getAttributes(){
        return $this->_attributes;
    }

    public function addClass($class){
        if(isset($this->_attributes['class'])){
            $this->_attributes['class'][] = $class;
        }else{
            $this->_attributes['class'] = [$class];
        }
    }

    public function removeClass($class){
        if(isset($this->_attributes['class'])){
            $i = array_search($this->_attributes['class'], $class);
            if($i !== false){
                $this->class = array_slice($this->_attributes['class'], $i, 1);
                return 1;
            }
            return -1;
        }else{
            return 0;
        }
    }
}