<?php


namespace Kyanag\Form\Tabler\Forms;

use Kyanag\Form\Component;

/**
 * 普通文本输入框
 *
 * @package Kyanag\Form\Tabler\Forms
 */
class Text extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <input 
    type="text" 
    class="form-control" 
    name="{$this->showName()}" 
    value="{$this->showValue()}"
    {$this->renderAttributes()}
  >
  <div class="invalid-feedback">{$this->error}</div>
  <small id="passwordHelpBlock" class="form-text text-muted">{$this->help}</small>
</div>
TPL;
    }
}
