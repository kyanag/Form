<?php


namespace Kyanag\Form\Basic;


use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Supports\Element;

class Text implements InputComponent
{

    /** @var Element  */
    protected $element;

    protected $label;

    public function __construct($name, $label = null)
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->element = new Element("input", [
            'type' => "text",
        ], 0);
    }

    public function setValue($value)
    {
        $this->element->setAttribute("value", $value);
    }

    public function render()
    {
        return "<p>{$this->label}: {$this->element->render()}</p>";
    }
}