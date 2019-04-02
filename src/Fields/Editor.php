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

    public $class = [];

    public static function getClassName(){
        return "kyanag-form-editor";
    }


    public function renderInput()
    {
        $this->class[] = static::getClassName();

        $value = $this->value;
        return "<div {$this->renderAttributes()}/>{$value}</div>" . $this->renderHidden();
    }

    public function renderHidden(){
        $value = $this->value;
        $attributes = [
            'name' => $this->name,
        ];
        return "<textarea style='display: none' {$this->renderAttributes($attributes)}>{$value}</textarea>";
    }

}