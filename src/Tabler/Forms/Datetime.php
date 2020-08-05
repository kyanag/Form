<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class Datetime extends Component
{

    public function render()
    {
        $dataset = HtmlRenderer::renderDataset($this->dataset);
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <input type="text" 
    class="form-control custom-datetime" name="{$this->showName()}" 
    id="{$this->showId()}"
    placeholder="{$this->attribute->placeholder}" 
    value="{$this->showValue()}" 
{$this->showDisabled()} {$this->showReadonly()}
    {$dataset}
  >
</div>
TPL;
    }
}