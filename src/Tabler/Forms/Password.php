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
  <input type="password" id="{$this->showId()}" class="form-control" name="{$this->showName()}" placeholder="{$this->attribute->placeholder}">
</div>
TPL;
    }
}
