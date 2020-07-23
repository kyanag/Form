<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;

class Textarea extends Component
{

    public function render()
    {
        $row = @$this->properties['row'] ?: 3;
        return <<<TPL
<div class="form-group">
  <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
  <textarea id="{$this->showId()}" class="form-control" name="{$this->showName()}" rows="{$row}" placeholder="{$this->attribute->placeholder}" {$this->showDisabled()} {$this->showReadonly()}>{$this->showValue()}</textarea>
</div>
TPL;
    }

}