<?php

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Element;
use Kyanag\Form\Interfaces\Column;
use Kyanag\Form\Interfaces\Inspector;
use Kyanag\Form\Interfaces\Renderable;

class Form extends Element implements Renderable
{

    protected $inspector;

    protected $_attributes = [
        'role' => "form"
    ];

    public function __construct(Inspector $inspector){
        $this->inspector = $inspector;
    }

    /**
     * @return \Kyanag\Form\Field[]
     */
    public function getActiveFields(){
        return $this->inspector->fields();
    }

    protected function beginForm(){
        return "<form {$this->renderAttributes()}>";
    }

    protected function endForm(){
        return "</form>";
    }

    protected function renderButton(){
        return (new FormButtonGroup())->render();
    }

    public function render()
    {
        $elements = [
            $this->beginForm()
        ];
        foreach ($this->getActiveFields() as $field){
            $elements[] = $field->render();
        }
        $elements[] = $this->renderButton();
        $elements[] = $this->endForm();
        return implode("", $elements);
    }

    public function fill($data){
        foreach($this->getActiveFields() as $field){
            $field->catchValue($data);
        }
    }

    public function fillError($errors){
        foreach($this->getActiveFields() as $field){
            $field->catchError($errors);
        }
    }
}