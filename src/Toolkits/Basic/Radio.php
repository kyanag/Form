<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Supports\Element;

class Radio extends Select
{


    protected function getElement()
    {
        $elements = [];
        foreach ($this->options as $value => $text){
            $attributes = [
                'type' => "radio",
                'name' => $this->name,
                'value' => $value,
                'checked' => ($value == $this->value),
            ];
            $elements[] = new Element("input", $attributes, Element::E_CLOSE_SINGLE);
            $elements[] = $text;
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