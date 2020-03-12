<?php


namespace Kyanag\Form\Interfaces;


interface InputComponent
{

    /**
     * @param mixed $value
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function getName();

    /**
     * @return Renderable
     */
    public function toRenderable();
}