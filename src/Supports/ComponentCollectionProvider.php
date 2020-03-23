<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Traits\ComponentCollectionAdapterTrait;

class ComponentCollectionProvider implements ComponentCollectionInterface
{

    /** @var array<string, ComponentInterface>  */
    protected $components = [];

    public function addComponent(ComponentInterface $component)
    {
        $this->components[] = $component;
        return $component;
    }

    /**
     * @param $value
     * @param null $path
     */
    public function setValue($value)
    {
        /** @var ComponentInterface $component */
        foreach ($this->components as $component){
            $name = $component->getName();
            if(isset($value[$name])){
                $component->setValue($value[$name]);
            }
        }
    }

    public function setError($error){
        /** @var ComponentInterface $component */
        foreach ($this->components as $component){
            $name = $component->getName();
            if(isset($error[$name])){
                $component->setError($error[$name]);
            }
        }
    }

}