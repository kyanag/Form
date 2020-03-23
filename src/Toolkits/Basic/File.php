<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Supports\Component;
use Kyanag\Form\Supports\Element;

class File extends Component implements ComponentInterface,Renderable
{

    public function __construct($name, $label = null)
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
    }

    protected function getElement(){
        $attributes = [
            'type' => "file",
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