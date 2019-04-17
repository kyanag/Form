<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/11
 * Time: 21:15
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Traits\MultiValue;

class Select2 extends Select
{

    public $multiple = false;

    /**
     * @var array
     */
    public $value = [];

    public $ajaxOptions = [];

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge($this->class, ['kyanag-form-multiselect']),
            'multiple' => $this->multiple,
            'value' => null,
        ];
    }

    public function selected($value){
        return in_array($value, $this->value);
    }

    public function getNameAttribute(){
        $name = parent::getNameAttribute();
        if($this->multiple){
            return $name . "[]";
        }
        return $name;
    }
}