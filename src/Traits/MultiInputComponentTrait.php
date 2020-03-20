<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\MultiInputComponent;
use Kyanag\Form\Interfaces\InputComponent;

/**
 * Trait FormData
 * @package Kyanag\Form\Traits
 * @mixin MultiInputComponent
 */
trait MultiInputComponentTrait
{

    use InputComponentTrait;

    /** @var array<string, InputComponent>  */
    protected $components = [];

    public function addComponent(InputComponent $component)
    {
        $this->components[] = $component;
        $this->addElement($component->toRenderable());
        return $component;
    }

    /**
     * @param $value
     * @param null $path
     */
    public function setValue($value)
    {
        /** @var InputComponent $component */
        foreach ($this->components as $component){
            $name = $component->getName();
            if(isset($value[$name])){
                $component->setValue($value[$name]);
            }
        }
    }

    public function setError($error){
        /** @var InputComponent $component */
        foreach ($this->components as $component){
            $name = $component->getName();
            if(isset($error[$name])){
                $component->setError($error[$name]);
            }
        }
    }
}