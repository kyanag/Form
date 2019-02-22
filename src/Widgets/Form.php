<?php

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Element;

class Form extends Element
{

    protected $fields = [];

    protected $_attributes = [
        'role' => "form"
    ];

    protected function beginForm(){
        return "<form {$this->renderAttributes()}>";
    }

    protected function endForm(){
        return "</form>";
    }

    protected function renderButton(){
        return (new FormButtonGroup())->render();
    }

    public function addField(Renderable $field){
        $this->fields[] = $field;
    }

    public function render()
    {
        $elements = [
            $this->beginForm()
        ];
        foreach ($this->fields as $field){
            $elements[] = $field->render();
        }
        $elements[] = $this->renderButton();
        $elements[] = $this->endForm();
        return implode("", $elements);
    }

}