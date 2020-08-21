<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;

class Password extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
  <input type="password" class="form-control {$this->renderClass()}  {$this->withSelectorPrefix("password")}" name="{$this->showName()}" {$this->renderAttributes()}>
</div>
TPL;
    }
}
