<?php


namespace Kyanag\Form\Basic;


use Kyanag\Form\Interfaces\InputControlElement;
use Kyanag\Form\Supports\Element;

class InputElementControl extends Element implements InputControlElement
{

    public function setValue($value)
    {
        $this->attributes["value"] = $value;
    }

}