<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 9:58
 */

namespace Kyanag\Form\Fields;


class Hidden extends Text
{

    public function render()
    {
        $field = $this;
        return <<<EOT
<input
            type="hidden"
            id="{$this->getId()}"
            name="{$field->getName()}"
            value="{$field->getValue()}"
            data-rules="{$field->getRules()}"
            {$field->addedAttributes()}
        >
EOT;

    }
}