<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Image extends File
{

    public $accept = "image/*";

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-image']),
            'name' => $this->name,
        ];
    }

}