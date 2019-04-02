<?php

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Field;
use Kyanag\Form\Fields\Button;
use Kyanag\Form\Fields\File;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\object_create;

class Form extends Field
{

    /** @var Field[] */
    protected $fields = [];

    protected $submitButton = true;

    protected $resetButton = true;

    public $attributes = [
        'role' => "form"
    ];

    public $class;

    public $value;

    public $method;

    public $action;

    public $enctype;

    public function field(Renderable $field){
        if($field instanceof File){
            $this->enctype = "multipart/form-data";
        }
        $this->fields[] = $field;
    }

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
        return "<form {$this->renderAttributes()}>";
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
                'html' => "提交",
            ])->render();
        }
        if($this->resetButton === true){
            $elements[] = object_create([
                '@id' => Button::class,
                'type' => "reset",
                'class' => "btn btn-primary btn btn-default",
                'html' => "重置",
            ])->render();
        }
        $elements[] = "</div></div>";
        return implode(" ", $elements);
    }

    protected function renderInput()
    {
        $value = $this->value;
        $elements = [];
        foreach ($this->fields as $field){
            $name = $field->name;
            if(isset($value[$name])){
                $field->value = $value[$name];
            }
            $elements[] = $field->render();
        }
        return implode("\n", $elements);
    }

    public function render()
    {
        $elements = [
            $this->beginForm()
        ];
        $elements[] = $this->renderInput();
        $elements[] = $this->renderButtons();
        $elements[] = $this->endForm();
        return implode("", $elements);
    }

}