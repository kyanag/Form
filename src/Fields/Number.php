<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 18:29
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

class Number extends Text
{

    public $min;

    public $max;

    public function getExtraAttributes()
    {
        return [
            'min' => $this->min,
            'max' => $this->max,
        ];
    }

    public function renderInput()
    {
        return "<input type=\"number\" {$this->renderAttributes()}/>";
    }
}