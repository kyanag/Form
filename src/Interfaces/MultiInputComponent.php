<?php


namespace Kyanag\Form\Interfaces;


interface MultiInputComponent extends InputComponent
{

    /**
     * @param InputComponent $component
     * @return InputComponent
     */
    public function addComponent(InputComponent $component);

}