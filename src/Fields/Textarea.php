<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 16:10
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

class Textarea extends Field
{

    public function renderInput(){
        $attributes = $this->getAttributes();

        $value = @$attributes['value'];
        unset($attributes['value']);

        return "<textarea {$this->renderAttributes()}/>{$value}</textarea>";
    }
}