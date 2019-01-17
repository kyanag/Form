<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/3
 * Time: 18:29
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

class Number extends Field
{
    public function renderInput()
    {
        $this->_attributes['type'] = "number";
        return "<input {$this->renderAttributes()}/>";
    }
}