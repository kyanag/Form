<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Supports\Element;

class Textarea extends Text
{

    protected function getElements()
    {
        return new Element("textarea", [
            'name' => $this->name,
        ], Element::E_CLOSE_DOUBLE, [
            $this->value
        ]);
    }

}