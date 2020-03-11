<?php


namespace Kyanag\Form\Interfaces;


interface InputControlElement extends Renderable
{

    /**
     * @param mixed $value
     * @return mixed
     */
    public function setValue($value);
}