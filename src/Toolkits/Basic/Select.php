<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Supports\Element;
use Kyanag\Form\Supports\ElementAdapter;
use Kyanag\Form\Traits\ElementAttributesTrait;
use function Kyanag\Form\renderOptions;

class Select extends Text
{

    protected $options;

    public function __construct($name, $label = null, $options = [])
    {
        parent::__construct($name, $label);
        $this->options = $options;
    }

    protected function getElements(){
        $optionStr = renderOptions($this->options);

        return new Element(
            "select",
            [
                'name' => $this->name,
            ],
            Element::E_CLOSE_DOUBLE,
            [
                $optionStr
            ]
        );
    }

}