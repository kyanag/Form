<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class File extends Field
{

    public $accept = "*/*";

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => $this->class,
        ];
    }

    protected function renderInput()
    {
        return "<input type=\"file\" {$this->renderAttributes($this->getAttributes())}/>";
    }
}