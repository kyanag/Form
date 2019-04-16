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

    public static $UPLOAD_URL;

    public static $DOMAIN;

    public $accept;

    public $data;

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-file']),
            'data' => $this->getDataAttribute(),
            'disabled' => true,
        ];
    }

    public function getDataAttribute(){
        return [
            'domain' => (static::$DOMAIN . $this->value) ?: null,
            'url' => $this->value,
            'upload_url' => static::$UPLOAD_URL,
        ];
    }

    public function renderInput()
    {
        return "<input type=\"file\" {$this->renderAttributes()}/><input type=\"hidden\" name=\"{$this->getNameAttribute()}\" value=\"{$this->value}\">";
    }
}