<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;

trait ActiveFormTrait
{

    protected $components = [];

    /**
     * 表单主题
     * @var ElementInterface
     */
    protected $element;

    public function addComponent(ComponentInterface $component)
    {
        $this->getElement()->addElement($component->toRenderable());
        $this->components[] = $component;
    }

    /**
     * @return array<ComponentInterface>
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * @return ElementInterface
     */
    public function getElement()
    {
        return $this->element;
    }

    public function setValue($attributes)
    {
        /** @var ComponentInterface $component */
        foreach ($this->getComponents() as $component){
            $name = $component->getName();
            if(isset($attributes[$name])){
                $component->setValue($attributes[$name]);
            }
        }
    }

    public function setError($errors)
    {
        /** @var ComponentInterface $component */
        foreach ($this->getComponents() as $component){
            $name = $component->getName();
            if(isset($errors[$name])){
                $component->setValue($errors[$name]);
            }
        }
    }
}