<?php


namespace Kyanag\Form\Tabler\Forms;


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
>
TPL;
    }

}