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

    /**
     * @var ['value' => $value, 'name' => $name][]
     */
    public $options;

    public function selected($value){
        return $this->value == $value;
    }

    public function getExtraAttributes()
    {
        return [
            'value' => null,
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