<?php


namespace Kyanag\Form\Tabler\Forms;



class Selectize extends Select
{

    public function render()
    {
        return <<<EOF
<div class="form-group">
<label class="form-label">{$this->showLabel()}</label>
<select name="beast" class="form-control selectize {$this->renderClass()}" {$this->renderAttributes()}>
  {$this->renderOptions()}
</select>
</div>
EOF;
    }

}