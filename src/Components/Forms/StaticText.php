<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;

/**
 * 原生文本组件
 *
 * @package Kyanag\Form\Components\Forms
 */
class StaticText extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="form-control-plaintext {$this->renderClass()} {$this->withNamespace("static")}" data-name="{$this->showName()}" {$this->renderAttributes()}>{$this->showValue()}</div>
</div>
TPL;
    }
}
