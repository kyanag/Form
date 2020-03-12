<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;

class Text implements InputComponent, Renderable
{

    protected $name;

    protected $label;

    protected $error;

    protected $help;

    protected $value;

    public function getName()
    {
        return $this->name;
    }


    public function setValue($value)
    {
        $this->value = $value;
    }


    public function toRenderable()
    {
        return $this;
    }

    public function render()
    {
        // TODO: Implement render() method.
    }
}