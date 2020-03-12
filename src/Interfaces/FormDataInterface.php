<?php


namespace Kyanag\Form\Interfaces;


interface FormDataInterface
{

    /**
     * @param InputComponent $component
     * @return mixed
     */
    public function addComponent(InputComponent $component);

    /**
     * @return FormBodyInterface
     */
    public function getBody();
}