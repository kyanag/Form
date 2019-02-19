<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 16:10
 */

namespace Kyanag\Form\Fields;


class Editor extends Textarea
{
    protected $_attributes = [];

    public static function getClassName(){
        return "kyanag-form-editor";
    }


    public function renderInput()
    {
        $attributes = $this->getAttributes();
        if(!isset($attributes['class'])){
            $attributes['class'] = [];
        }
        $attributes['class'][] = static::getClassName();

        $value = @$attributes['value'];
        unset($attributes['value']);
        unset($attributes['value']);
        return "<div {$this->renderAttributes($attributes)}/>{$value}</div>" . $this->renderHidden();
    }

    public function renderHidden(){
        $value = @$this->_attributes['value'];
        $attributes = [
            'name' => @$this->_attributes['name']
        ];
        return "<textarea style='display: none' {$this->renderAttributes($attributes)}>{$value}</textarea>";
    }

}