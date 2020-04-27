<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;

/**
 * Trait ElementTrait
 * @package Kyanag\Form\Traits
 */
trait ElementTrait
{

    /**
     * @var array<Renderable>
     */
    protected $elements = [];

    /**
     * @var array<mixed>
     */
    protected $attributes = [];

    public function addElement(Renderable $renderable)
    {
        $this->elements[] = $renderable;
        return $renderable;
    }

    public function setAttribute($name, $attribute){
        $this->attributes[$name] = $attribute;
    }

    public function removeAttribute($name){
        unset($this->attributes[$name]);
    }

    protected function renderAttributes(){
        $_ = [];
        foreach ($this->attributes as $name => $value){
            $_[] = $this->renderAttribute($name, $value);
        }
        return implode(" ", $_);
    }

    protected function renderAttribute($name, $value){
        if($name == "data"){
            //TODO
            return "";
        }else{
            if(is_bool($value)){
                return $value ? "{$name}={$name}" : "";
            }
            if(is_array($value)){
                $value = implode(" ", $value);
            }
            return "{$name}=\"{$value}\"";
        }
    }

}