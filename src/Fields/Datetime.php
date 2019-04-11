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
 * @package Kyanag\Form\Fields
 */
class Datetime extends Text
{

    public $data = [
        'format' => "yyyy-mm-dd",
        'language' => "zh-CN",
        'autoclose' => 1,
    ];

    public function getExtraAttributes()
    {
        return [
            'type' => "text",
            'class' => array_merge($this->class, ["kyanag-form-datetime"]),
            'data' => $this->data,
        ];
    }

    public function renderInput()
    {
        return "<input {$this->renderAttributes()}/>";
    }
}