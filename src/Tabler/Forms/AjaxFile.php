<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class AjaxFile extends Component
{

    public function render()
    {
        $dataset = HtmlRenderer::renderDataset($this->dataset);
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="input-group">
      <input type="text" class="form-control ajax-file-input" name="{$this->showName()}" {$dataset}>
      <span class="input-group-append" id="basic-addon2">
            <button type="button" class="btn btn-primary ajax-file-btn">选择文件</button>
      </span>
  </div>
</div>
TPL;
    }

}