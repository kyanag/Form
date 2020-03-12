<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\FormDataInterface;
use Kyanag\Form\Interfaces\InputComponent;

/**
 * Trait FormData
 * @package Kyanag\Form\Traits
 * @mixin FormDataInterface
 */
trait FormDataTrait
{

    /** @var array<string, InputComponent>  */
    protected $components = [];

    public function addComponent(InputComponent $component)
    {
        $this->components[] = $component;
        $this->getBody()->addElement($component->toRenderable());

        return $component;
    }

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

}