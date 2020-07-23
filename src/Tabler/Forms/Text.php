<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;

/**
 * 普通文本输入框
 * @package Kyanag\Form\Tabler\Forms
 */
class Text extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <input type="text" class="form-control" name="{$this->showName()}" 
    placeholder="{$this->attribute->placeholder}" value="{$this->showValue()}" {$this->showDisabled()} {$this->showReadonly()}
  >
</div>
TPL;
    }

}