<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class CardForm extends Form
{

    public $title = "编辑";

    public function render()
    {
        return <<<TPL
{$this->renderFormHeader()}
    {$this->renderHeader()}
    <div class="card-body">
        {$this->renderChildren()}
    </div>
    {$this->renderActionButton()}
{$this->renderFormFooter()}
TPL;
    }


    protected function renderHeader(){
        return <<<EOF
<div class="card-header">
    <h3 class="card-title">{$this->title}</h3>
</div>
EOF;

    }

    protected function renderActionButton(){
        return <<<EOF
<div class="card-footer text-right">
    <button type="submit" class="btn btn-primary">确认</button>
</div>
EOF;
    }
}