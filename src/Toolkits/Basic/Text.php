<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Contracts\Component;
use Kyanag\Form\Supports\Element;

class Text extends Component implements ComponentInterface,Renderable
{

    public function __construct($name, $label = null)
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
    }

    protected function getElement(){
        $attributes = [
            'type' => "text",
            'value' => $this->value,
        ];
        return new Element("input", $attributes, 0);
    }

    public function toRenderable()
    {
        return $this;
    }

    public function render()
    {
        return "<p>{$this->label}: {$this->getElement()->render()}</p>";
    }
}