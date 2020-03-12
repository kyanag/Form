<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Supports\Element;

class Radio extends Select
{


    protected function getElements()
    {
        $elements = [];
        foreach ($this->options as $option){
            $attributes = [
                'type' => "radio",
                'name' => $this->name,
                'value' => $option['value'],
                'checked' => ($option['value'] == $this->value),
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