<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/11
 * Time: 21:15
 */

namespace Kyanag\Form\Fields;


class Select2 extends Select
{

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge($this->class, ['kyanag-form-select2']),
            'multiple' => $this->multiple,
            'value' => null,
        ];
    }

    public function getNameAttribute(){
        $name = parent::getNameAttribute();
        if($this->multiple){
            return $name . "[]";
        }
        return $name;
    }
}