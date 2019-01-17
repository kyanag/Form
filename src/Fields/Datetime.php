<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


class Datetime extends Text
{
    static $name = "日期";

    public static function getDatePickerClassName(){
        return "ims-datetime";
    }

    public function render()
    {
        $field = $this;

        $errorClass = $this->getError() ? "has-error" : "";
        return <<<EOT
<div class="form-group row {$errorClass}">
    <label for="{$field->getId()}" class="col-sm-2 control-label">{$field->getLabel()}</label>
    <div class="col-sm-2">
        <input
            type="text"
            class="form-control {$field->addedClasses()} {$field::getDatePickerClassName()}"
            id="{$this->getId()}"
            name="{$field->getName()}"
            value="{$field->getValue()}"
            data-rules="{$field->getRules()}"
            {$field->addedAttributes()}
            readonly
        >
    </div>
</div>
EOT;
    }
}