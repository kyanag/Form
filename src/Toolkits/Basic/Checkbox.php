<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Supports\Element;

class Checkbox extends Select
{


    protected function getElements()
    {
        $this->value = (array)$this->value;

        $elements = [];
        foreach ($this->options as $option){
            $attributes = [
                'type' => "checkbox",
                'name' => "{$this->name}[]",
                'value' => $option['value'],
                'checked' => in_array($option['value'], $this->value),
                'autocomplete' => "off"                                         //firefox bug
            ];
            $elements[] = new Element("input", $attributes, Element::E_CLOSE_SINGLE);
            $elements[] = $option['title'];
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