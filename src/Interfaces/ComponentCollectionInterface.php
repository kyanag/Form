<?php


namespace Kyanag\Form\Interfaces;


interface ComponentCollectionInterface extends VariableInterface
{

    /**
     * @param mixed $value
     */
    public function setValue($value);


    /**
     * @param mixed $error
     */
    public function setError($error);

    /**
     * @param ComponentInterface $component
     * @return ComponentInterface
     */
    public function addComponent(ComponentInterface $component);

}