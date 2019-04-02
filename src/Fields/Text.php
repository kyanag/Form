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
class Text extends Field
{

    public function renderInput()
    {
        return "<input type=\"text\" {$this->renderAttributes()}/>";
    }
}