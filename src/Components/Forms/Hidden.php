<?php


namespace Kyanag\Form\Components\Forms;


use Kyanag\Form\Component;

class Hidden extends Component
{

    public function render()
    {
        return <<<TPL
<input 
  type="hidden"
  name="{$this->showName()}" 
  value="{$this->showValue()}"
  {$this->renderAttributes()}
  class="{$this->renderClass()} {$this->withNamespace("hidden")}"
>
TPL;
    }

}