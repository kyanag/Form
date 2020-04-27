<?php


namespace Kyanag\Form\Interfaces;


interface ComponentCollectionInterface
{

    /**
     * @param ComponentInterface $component
     * @return ComponentInterface
     */
    public function addComponent(ComponentInterface $component);

    /**
     * @return array
     */
    public function getComponents();
}