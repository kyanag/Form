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
 * @package Kyanag\Form\Fields
 */
class Hidden extends Text
{

    public function init()
    {
        $this->_template = "{input}";
    }

    public function renderInput()
    {
        return "<input type=\"hidden\" {$this->renderAttributes()}/>";
    }
}