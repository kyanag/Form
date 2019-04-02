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
class Image extends File
{

    public function getExtraAttributes()
    {
        return [
            'type' => "file",
            'accept' => "image/*",
            'class' => array_merge($this->class, ['kyanag-form-image']),
        ];
    }
}