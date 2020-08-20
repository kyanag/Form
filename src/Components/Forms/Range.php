<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;

/**
 * 滑动输入框
 *
 * @package Kyanag\Form\Components\Forms
 */
class Range extends Component
{

    public $default = 0;

    public $min = 0;

    public $step = 1;

    public $max = 100;

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="row align-items-center">
    <div class="col">
      <input type="range" class="custom-range {$this->renderClass()} {$this->withNamespace("range")}" 
          step="{$this->step}" 
          min="{$this->min}" 
          max="{$this->max}" 
          name="{$this->showName()}" 
          value="{$this->showValue()}" 
          {$this->renderAttributes()}
    >
    </div>
    <div class="col-auto">
      <input type="number" class="form-control w-8 custom-range-input" name="{$this->showName()}" value="{$this->showValue()}">
    </div>
  </div>
</div>
TPL;
    }
}
