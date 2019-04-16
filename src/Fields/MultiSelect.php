<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/11
 * Time: 21:15
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Traits\MultiValue;

class MultiSelect extends Select
{

    use MultiValue;

    /**
     * @var array
     */
    public $value = [];

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge($this->class, ['kyanag-form-multiselect']),
            'multiple' => true,
            'value' => null,
        ];
    }

    public function selected($value){
        return in_array($value, $this->value);
    }
}