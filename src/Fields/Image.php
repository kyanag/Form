<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;
use function Kyanag\Form\object_create;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Image extends File
{

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-image']),
            'data' => $this->getOptionsAttribute(),
            'name' => $this->name,
        ];
    }

}