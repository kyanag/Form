<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:44
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

class Password extends Field
{

    public function renderInput()
    {
        $this->_attributes['type'] = "password";
        return "<input {$this->renderAttributes()}/>";
    }
}