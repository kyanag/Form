<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


class Checkbox extends Select
{
    static $name = "多选";

    public function render()
    {
        $field = $this;
        $option_str = "";
        foreach ($field->getOptions() as $index => $option){
            $checked = $field->selected($option['value']) ? "checked" : "";
            $str = <<<EOT1
<label class="checkbox-inline">
    <input type="checkbox"
        id="{$this->getId()}-{$option['value']}"
        value="{$option['value']}"
        name="{$field->getName()}[]"
        class="{$field->addedClasses() }"
        data-rules="{$field->getRules() }"
        {$checked}
    ><label for="{$this->getId()}-{$option['value']}">{$option['text']}</label>
</label>
EOT1;
            $option_str .= $str;
        }
        $errorClass = $this->getError() ? "has-error" : "";
        return <<<EOT
<div class="form-group row {$errorClass}">
    <label for="{$field->getId() }" class="col-sm-2 control-label">{$field->getLabel()}</label>
    <div class="col-sm-8">
        {$option_str}
    </div>
    <div></div>
</div>
EOT;
    }
}