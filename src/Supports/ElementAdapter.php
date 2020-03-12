<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Interfaces\Renderable;

class ElementAdapter implements Renderable
{

    protected $string;


    public function __construct($string)
    {
        $this->string = $string;
    }

    public function render()
    {
        return $this->string;
    }
}