<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 9:58
 */

namespace Kyanag\Form\Fields;


/**
 * @Annotation
 * @package Kyanag\FormBuilder\Fields
 */
class Hidden extends Text
{

    public function renderInput()
    {
        $this->_template = "{input}";
        return "<input type=\"hidden\" {$this->renderAttributes($this->getAttributes())}/>";
    }
}