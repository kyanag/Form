<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

class Select extends Field
{

    /**
     * @var ['value' => $value, 'name' => $name][]
     */
    public $options;

    public function selected($value){
        return $this->value == $value;
    }

    protected function renderInput()
    {
        $items = [];
        foreach($this->options as $option){
            $selected = $this->selected($option['value']) ? "selected" : "";
            $items[] = "<option value='{$option['value']}' {$selected}>{$option['name']}</option>";
        }
        $options = implode("", $items);
        return "<select {$this->renderAttributes()}>{$options}</select>";
    }
}