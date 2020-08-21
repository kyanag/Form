<?php


namespace Kyanag\Form\Components\Forms;



class Selectize extends Select
{

    public function render()
    {
        return <<<EOF
<div class="form-group">
<label class="form-label">{$this->showLabel()}</label>
<select name="beast" class="form-control {$this->renderClass()} {$this->withSelectorPrefix("selectize")}" {$this->renderAttributes()}>
  {$this->renderOptions()}
</select>
</div>
EOF;
    }

}