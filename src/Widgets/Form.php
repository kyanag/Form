<?php

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Field;
use Kyanag\Form\Fields\Button;
use function Kyanag\Form\object_create;
use Kyanag\Form\Fields\MultiField;

class Form extends MultiField
{

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
            'name' => null,
            'data' => null,
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
            $submitBtn = new Button();
            $submitBtn->type = "submit";
            $submitBtn->class = [
                "btn btn-primary"
            ];
            $submitBtn->value = "提交";

            $elements[] = $submitBtn->render();
        }
        if($this->resetButton === true){
            $resetBtn = new Button();
            $resetBtn->type = "reset";
            $resetBtn->class = [
                "btn btn-default"
            ];
            $resetBtn->value = "重置";

            $elements[] = $resetBtn->render();
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