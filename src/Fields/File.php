<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

class File extends Field
{

    public $accept;

    public function getExtraAttributes()
    {
        return [
            'type' => "file",
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-file']),
        ];
    }

    public function renderInput()
    {
        return "<input type=\"file\" {$this->renderAttributes()}/>";
    }
}