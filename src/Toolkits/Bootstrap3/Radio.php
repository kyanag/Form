<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use function Kyanag\Form\randomString;

class Radio extends Checkbox
{

    protected function renderOptions(){
        $_ = [];
        foreach ($this->options as $value => $text){

            $checked = $this->selected($value) ? "checked" : "";
            $tpl = <<<TPL
<div class="radio">
  <label>
    <input type="radio" name="{$this->name}" value="{$value}" {$checked}> {$text}
  </label>
</div>
TPL;
            $_[] = $tpl;
        }
        return implode("", $_);
    }

}