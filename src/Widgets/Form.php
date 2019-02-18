<?php

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Element;
use Kyanag\Form\Interfaces\Column;
use Kyanag\Form\Interfaces\Inspector;
use Kyanag\Form\Interfaces\Renderable;

class Form extends Element implements Renderable
{

    protected $inspector;

    public function __construct(Inspector $inspector){
        $this->inspector = $inspector;
    }

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
        foreach ($this->inspector->fields() as $field){
            $elements[] = $field->render();
        }
        $elements[] = $this->renderButton();
        var_dump(end($elements));exit();
        $elements[] = $this->endForm();
        return implode("", $elements);
    }
}