<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


/**
 * @Annotation
 * @property string $a
 * @package Kyanag\FormBuilder\Fields
 */
class Datetime extends Text
{

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge($this->class, ["kyanag-form-datetime"]),
        ];
    }

    public function renderInput()
    {
        return "<input type='datetime' {$this->renderAttributes($this->getAttributes())}/>";
    }
}