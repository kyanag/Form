<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


class Checkbox extends Radio
{

    public $subAttributes = [
        'class' => [
            'form-check-input'
        ],
        'type' => "checkbox",
    ];

    public function selected($value)
    {
        if(is_array($this->value)){
            return in_array($value, $this->value);
        }else{
            return false;
        }
    }
}