<?php


namespace Kyanag\Form\Interfaces;


interface ComponentCollectionInterface extends VariableInterface
{

    /**
     * @param ComponentInterface $component
     * @return ComponentInterface
     */
    public function addComponent(ComponentInterface $component);

}