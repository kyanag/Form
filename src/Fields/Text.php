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
 * Class Text
 * @package Kyanag\Form\Fields
 * @property @id
 * @property @name
 * @property @value
 */
class Text extends Field
{

    public function getType(){
        return "text";
    }

    public function renderInput()
    {
        $attributes = $this->getAttributes();
        $attributes['type'] = $this->getType();
        return "<input {$this->renderAttributes($attributes)}/>";
    }
}