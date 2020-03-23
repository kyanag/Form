<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Supports\Element;

class Checkbox extends Select
{


    protected function getElement()
    {
        $this->value = (array)$this->value;

        $elements = [];
        foreach ($this->options as $value => $title){
            $attributes = [
                'type' => "checkbox",
                'name' => "{$this->name}",
                'value' => $value,
                'checked' => in_array($value, $this->value),
                'autocomplete' => "off"                                         //firefox bug
            ];
            $elements[] = new Element("input", $attributes, Element::E_CLOSE_SINGLE);
            $elements[] = $title;
            $elements[] = "<br>";
        }
        if(count($elements)){
            array_pop($elements);
        }

        return new Element(
            "div",
            [],
            Element::E_CLOSE_DOUBLE,
            $elements
        );
    }

}