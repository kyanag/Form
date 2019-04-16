<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/11
 * Time: 21:15
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;
use Kyanag\Form\Traits\MultiValue;

class AutoComplete extends Select
{

    use MultiValue;

    public $value = [];

    public function getExtraAttributes()
    {
        return [
            'class' => array_merge($this->class, ['kyanag-form-autocomplete']),
            'value' => null,
        ];
    }

    public function isMulti(){

    }

}