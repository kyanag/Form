<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/28
 * Time: 9:50
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

class Button extends Field
{

    protected $_template = "{input}";

    public $html;

    protected function renderInput()
    {
        return "<button {$this->renderAttributes()}>{$this->html}</button>";
    }

}