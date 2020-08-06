<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;

class Select2 extends Component
{

    public function render()
    {
        $multiStr = $this->multiple ? "multiple" : "";
        return <<<EOF
<div class="form-group">
<label class="form-label">{$this->showLabel()}</label>
<select name="beast" class="form-control custom-select select2" {$multiStr}>
  <option value="1">Chuck Testa</option>
  <option value="4">Sage Cattabriga-Alosa</option>
  <option value="3">Nikola Tesla</option>
</select>
</div>
EOF;
    }

}