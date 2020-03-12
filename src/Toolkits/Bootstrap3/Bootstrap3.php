<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\FormBody;

class Bootstrap3 extends FormBody
{

    protected $attributes = [
        'class' => [],
        'role' => "form",
        ''
    ];

    protected function renderBegin()
    {
        if(!isset($this->attributes['class'])){
            $this->attributes['class'] = [];
        }
        if(!is_array($this->attributes['class'])){
            $this->attributes['class'] = (array)$this->attributes['class'];
        }
        $this->attributes['class'][] = "form-horizontal";
        return parent::renderBegin();
    }

}