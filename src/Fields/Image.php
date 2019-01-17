<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

class Image extends Field
{

    public function __construct(array $config = [])
    {
        !isset($config['id']) && $config['id'] = $this->generateId();
        parent::__construct($config);
    }

    public static function getBtnClassName(){
        return "ims-upload-btn";
    }

    public static function getPreviewBtnClassName(){
        return "ims-preview";
    }

    public function getBtnId(){
        return $this->id . "-btn";
    }

    public function renderInput()
    {
        $elements = [

        ];
        return <<<EOT
<div class="form-group row {$errorClass}">
    <label for="{$field->getId()}-btn" class="col-sm-2 control-label">{$field->getLabel()}</label>
    <div class="col-sm-8">
        <div class="input-group">
            <input
                type="text"
                class="form-control {$field->addedClasses()}"
                id="{$field->getId()}"
                name="{$field->getName()}"
                value="{$field->getValue()}"
                data-rules="{$field->getRules()}"
                {$field->addedAttributes()}
            >
            <span class="input-group-btn">
                <button class="btn btn-default {$this::getBtnClassName()}" type="button" data-for="{$field->getId()}">上传</button>
                <a class="btn btn-default {$this::getPreviewBtnClassName()}" data-for="{$field->getId()}">预览</a>
            </span>
        </div>
    </div>
    <div class="col-sm-2">
        {$field->getHelp()}
    </div>
</div>
EOT;

    }
}