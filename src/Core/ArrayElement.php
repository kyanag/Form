<?php


namespace Kyanag\Form\Core;


use Kyanag\Form\Interfaces\ChooseElement;
use Kyanag\Form\Interfaces\Element;

class ArrayElement implements Element, ChooseElement
{

    protected $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function __get($name)
    {
        return @$this->attributes[$name];
    }
}