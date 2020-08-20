<?php


namespace Kyanag\Form\Components\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class Datetime extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <input type="text" 
    class="form-control custom-datetime {$this->renderClass()} {$this->withNamespace("datetime")}"
    name="{$this->showName()}" 
    value="{$this->showValue()}" 
    {$this->renderAttributes()}
  >
</div>
TPL;
    }
}