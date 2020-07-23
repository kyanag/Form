<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;

/**
 * 滑动输入框
 * @package Kyanag\Form\Tabler\Forms
 */
class Range extends Component
{

    public $extras = [
        'min' => 0,
        'step' => 1,
        'max' => 100
    ];

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="row align-items-center">
    <div class="col">
      <input type="range" class="form-control custom-range" step="{$this->extras['step']}" min="{$this->extras['min']}" max="{$this->extras['max']}" name="{$this->showName()}" value="{$this->showValue()}">
    </div>
    <div class="col-auto">
      <input type="number" class="form-control w-8" value="45" name="{$this->showName()}" value="{$this->showValue()}">
    </div>
  </div>
</div>
TPL;
    }

}