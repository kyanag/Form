<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 16:10
 */

namespace Kyanag\Form\Fields;


/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Editor extends Textarea
{

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge((array)$this->class, ["kyanag-form-editor"]),
        ];
    }

    public function renderInput()
    {
        $value = $this->value;
        return "<div {$this->renderAttributes($this->getAttributes())}/>{$value}</div>" . $this->renderHidden();
    }

    public function renderHidden(){
        $value = $this->value;
        $attributes = [
            'name' => $this->name,
        ];
        return "<textarea style='display: none' {$this->renderAttributes($attributes)}>{$value}</textarea>";
    }

}