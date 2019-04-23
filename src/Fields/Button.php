<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/28
 * Time: 9:50
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Button extends Field
{

    public $html;

    protected $_template = "{input}";

    protected function renderInput()
    {
        return "<button {$this->renderAttributes($this->getAttributes())}>{$this->value}</button>";
    }

}