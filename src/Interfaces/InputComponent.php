<?php


namespace Kyanag\Form\Interfaces;


interface InputComponent
{

    /**
     * @param string $value
     */
    public function setValue($value);

    /**
     * @param string $help
     */
    public function setHelp($help);

    /**
     * @param string $error
     */
    public function setError($error);

    /**
     * @param $label
     */
    public function setLabel($label);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return Renderable
     */
    public function toRenderable();
}