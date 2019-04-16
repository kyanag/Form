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
class File extends Field
{

    public $accept;

    public $data;

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-file']),
            'data' => $this->getDataAttribute(),
            'name' => null,
        ];
    }

    public function getDataAttribute(){
        return [
            'domain' => object_create(["@id" => "kyanag.form.file.domain"]),
            'url' => $this->value,
            'upload_url' => object_create(["@id" => "kyanag.form.file.uploa_url"]),
        ];
    }

    public function renderInput()
    {
        return "<input type=\"file\" {$this->renderAttributes()}/><input type=\"hidden\" name=\"{$this->getNameAttribute()}\" value=\"{$this->value}\">";
    }
}