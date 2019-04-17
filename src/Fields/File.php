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
use Kyanag\Form\Traits\UploadField;

/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class File extends Field
{

    use UploadField;

    public $accept;

    public $data;

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-file']),
            'data' => $this->getOptionsAttribute(),
            'name' => $this->name,
        ];
    }

    public function renderInput()
    {
        return "<input type=\"file\" {$this->renderAttributes()}/>";
    }
}