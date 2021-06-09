<?php


namespace Kyanag\Form\Core;

use Kyanag\Form\Interfaces\Option;

class ArrayOption implements Option
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
