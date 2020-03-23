<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\ComponentCollectionInterface;

/**
 * Trait FormData
 * @package Kyanag\Form\Traits
 */
trait ComponentCollectionAdapterTrait
{
    use ElementAdapterTrait;

    /**
     * @return ComponentCollectionInterface
     */
    abstract public function getComponentCollection();

    public function addComponent(ComponentInterface $component){
        $this->getComponentCollection()->addComponent($component);
        $this->getElement()->addRenderable($component->toRenderable());
    }

    public function setValue($value){
        $this->getComponentCollection()->setValue($value);
    }

    public function setError($error){
        $this->getComponentCollection()->setError($error);
    }
}