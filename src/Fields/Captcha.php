<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/14
 * Time: 18:33
 */

namespace Kyanag\Form\Fields;


class Captcha extends Text
{
    public function render()
    {
        $field = $this;
        $errorClass = $this->getError() ? "has-error" : "";
        return <<<EOT
<div class="form-group row {$errorClass}">
    <label for="{$field->getId()}" class="col-sm-2 control-label">{$field->getLabel()}</label>
    <div class="col-sm-8">
        <input
            type="text"
            class="form-control {$field->addedClasses()}"
            id="{$this->getId()}"
            name="{$field->getName()}"
            value="{$field->getValue()}"
            data-rules="{$field->getRules()}"
            {$field->addedAttributes()}
        >
        <span class="help-block">{$this->getError()}</span>
    </div>
    <div class="col-sm-2">{$this->getHelp()}</div>
</div>
EOT;
    }
}