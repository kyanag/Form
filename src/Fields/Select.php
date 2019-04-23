<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Select extends Field
{

    public $multiple = false;
    /**
     * @var ['value' => $value, 'name' => $name][]
     */
    public $options = [];

    public function selected($value){
        if(is_array($this->value)){
            return in_array($value, $this->value);
        }
        return $this->value == $value;
    }

    public function getExtraAttributes()
    {
        return [
            'value' => null,    //覆盖value属性
            'multiple' => $this->multiple,
        ];
    }

    protected function renderInput()
    {
        $items = [];
        foreach($this->options as $option){
            $selected = $this->selected($option['value']) ? "selected" : "";
            $items[] = "<option value='{$option['value']}' {$selected}>{$option['name']}</option>";
        }
        $options = implode("", $items);
        return "<select {$this->renderAttributes($this->getAttributes())}>{$options}</select>";
    }
}