<?php


namespace Kyanag\Form\Components\Forms;


use Kyanag\Form\Component;

class CkEditor extends Component
{

    public $row = 3;

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
  <textarea class="form-control {$this->renderClass()} {$this->withNamespace("ckeditor")}" name="{$this->showName()}" rows="{$this->row}" {$this->renderAttributes()}>{$this->showValue()}</textarea>
</div>
TPL;
    }

}