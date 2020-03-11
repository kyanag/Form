<?php


namespace Kyanag\Form\Interfaces;


interface InputComponent extends Renderable
{

    /**
     * @param mixed $value
     * @return mixed
     */
    public function setValue($value);
}