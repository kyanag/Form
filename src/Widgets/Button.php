<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 10:13
 */

namespace Kyanag\Form\Widgets;


use Kyanag\Form\Element;

class Button extends Element
{
    public function render()
    {
        $label = $this->_attributes['label'];
        return "<button {$this->renderAttributes()}/>{$label}</button>";
    }
}