<?php


namespace Kyanag\Form\Interfaces;


interface ComponentCollectionInterface extends VariableInterface
{

    public function addComponent(ComponentInterface $component);

}