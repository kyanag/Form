<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 16:10
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Textarea extends Field
{

    public function getDefaultAttributes()
    {
        return $defaultAttributes = array_filter([
            'id' => $this->id,
            'name' => $this->name,
            'class' => $this->class,
            'readonly' => $this->reanonly,
            'disabled' => $this->disabled,
            'autofocus' => $this->autofocus,
        ], function($item){
            return !is_null($item);
        });
    }

    public function renderInput(){
        $value = $this->value;
        return "<textarea {$this->renderAttributes()}/>{$value}</textarea>";
    }
}