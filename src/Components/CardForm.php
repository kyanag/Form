<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class CardForm extends Form
{


    public $properties = [
        'title' => "编辑"
    ];

    public function render()
    {
        $childrenHtml = HtmlRenderer::renderComponents($this->children);
        return <<<TPL
<form action="{$this->action}" method="{$this->showMethod()}" enctype="{$this->enctype}" class="card" id="{$this->showId()}">
    {$this->renderHeader()}
    <div class="card-body">
        {$childrenHtml}
    </div>
    {$this->renderFooter()}
</form>
TPL;
    }


    protected function renderHeader(){
        return <<<EOF
<div class="card-header">
    <h3 class="card-title">{$this->properties['title']}</h3>
</div>
EOF;

    }

    protected function renderFooter(){
        return <<<EOF
<div class="card-footer text-right">
    <button type="submit" class="btn btn-primary">确认</button>
</div>
EOF;
    }
}