<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class AjaxFile extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="input-group">
      <input type="text" class="form-control ajax-file-input {$this->renderClass()}" name="{$this->showName()}" value="{$this->showValue()}" {$this->renderAttributes()}>
      <span class="input-group-append">
            <button type="button" class="btn btn-primary ajax-file-btn">选择文件</button>
      </span>
  </div>
</div>
TPL;
    }

}