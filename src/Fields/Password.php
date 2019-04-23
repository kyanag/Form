<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:44
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Password extends Text
{

    public function renderInput()
    {
        return "<input type=\"password\" {$this->renderAttributes($this->getAttributes())}/>";
    }
}