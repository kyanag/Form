<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;


/**
 * 原生文本组件
 * @package Kyanag\Form\Tabler\Forms
 */
class StaticText extends Component
{

    public function render()
    {
       return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="form-control-plaintext" data-name="{$this->showName()}">{$this->showValue()}</div>
</div>
TPL;
    }

}