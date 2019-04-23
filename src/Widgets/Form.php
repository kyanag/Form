<?php

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Field;
use Kyanag\Form\Fields\Button;
use function Kyanag\Form\object_create;
use Kyanag\Form\Traits\MultiField;

class Form extends Field
{

    use MultiField;

    protected $submitButton = true;

    protected $resetButton = true;

    public $attributes = [
        'role' => "form"
    ];

    public $class = [];

    public $method;

    public $action;

    public $enctype;

    public function getExtraAttributes()
    {
        return [
            'method' => $this->method,
            'action' => $this->action,
            'enctype' => $this->enctype,
            'value' => null,
        ];
    }

    protected function beginForm(){
        return "<form {$this->renderAttributes($this->getAttributes())}>";
    }

    protected function endForm(){
        return "</form>";
    }

    protected function renderButtons(){
        $elements = [
            "<div class=\"form-group row\"><div class=\"col-sm-offset-2 col-sm-8 text-center\">"
        ];
        if($this->submitButton === true){
            $elements[] = object_create([
                '@id' => Button::class,
                'type' => "submit",
                'class' => "btn btn-primary",
                'value' => "提交",
            ])->render();
        }
        if($this->resetButton === true){
            $elements[] = object_create([
                '@id' => Button::class,
                'type' => "reset",
                'class' => "btn btn-primary btn btn-default",
                'value' => "重置",
            ])->render();
        }
        $elements[] = "</div></div>";
        return implode(" ", $elements);
    }



    public function render()
    {
        $elements = [
            $this->beginForm(),
            $this->renderInput(),
            $this->renderButtons(),
            $this->endForm(),
        ];
        return implode("", $elements);
    }

}