<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Supports\Element;
use Kyanag\Form\Traits\ElementAttributesTrait;
use Kyanag\Form\Traits\InputComponentTrait;

class Hidden implements InputComponent,Renderable
{

    use InputComponentTrait;

    public function __construct($name, $label = null)
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    protected function getElements(){
        $attributes = [
            'type' => "hidden",
            'value' => $this->value,
        ];
        return new Element("input", $attributes, 0);
    }

    public function getName()
    {
        return $this->name;
    }

    public function toRenderable()
    {
        return $this;
    }

    public function render()
    {
        return $this->getElements()->render();
    }
}