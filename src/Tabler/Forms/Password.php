<?php


namespace Kyanag\Form\Tabler\Forms;

use Kyanag\Form\Component;

class Password extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
  <input type="password" class="form-control {$this->renderClass()}" name="{$this->showName()}" {$this->renderAttributes()}>
</div>
TPL;
    }
}
