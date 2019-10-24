<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 16:10
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Textarea extends Field
{

    public function getExtraAttributes()
    {
        return [
            'value' => null,
            'disabled' => $this->disabled,
            'autofocus' => $this->autofocus,
            'data' => $this->data,
        ];
    }

    public function renderInput(){
        $value = $this->value;
        return "<textarea {$this->renderAttributes($this->getAttributes())}/>{$value}</textarea>";
    }
}