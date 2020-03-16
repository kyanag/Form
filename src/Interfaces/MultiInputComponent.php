<?php


namespace Kyanag\Form\Interfaces;


interface MultiInputComponent extends InputComponent
{

    /**
     * @param InputComponent $component
     * @return mixed
     */
    public function addComponent(InputComponent $component);

}