<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/11
 * Time: 21:15
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

class MultiSelect extends Select
{

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge($this->class, ['kyanag-form-multiselect']),
            'multiple' => true,
            'name' => $this->getNameAttribute() . "[]",
            'value' => null,
        ];
    }

    public function selected($value){
        return in_array($value, $this->value);
    }
}