<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use function Kyanag\Form\randomString;

class Checkbox extends Select
{

    public function render()
    {
        $id = randomString($this->name);

        $hasError = $this->error ? "has-error" : "";
        $helpText = $this->error ?: $this->help;

        $options = $this->renderOptions();

        $tpl = <<<TPL
<div class="form-group {$hasError}">
    <label for="form-{$id}" class="col-sm-2 control-label">{$this->label}</label>
    <div class="col-sm-4">{$options}</div>
    <p class="col-sm-6 help-block">{$helpText}</p>
</div>
TPL;
        return $tpl;
    }

    protected function renderOptions(){
        $_ = [];
        foreach ($this->options as $value => $text){

            $checked = $this->selected($value) ? "checked" : "";
            $tpl = <<<TPL
<div class="checkbox">
  <label>
    <input type="checkbox" name="{$this->name}" value="{$value}" {$checked}> {$text}
  </label>
</div>
TPL;
            $_[] = $tpl;
        }
        return implode("", $_);
    }

}