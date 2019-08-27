<?php


namespace Kyanag\Form\Fields;


class AjaxImage extends AjaxFile
{

    public $accept = "*/*";

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-ajaximage']),
            'name' => $this->name,
        ];
    }

    protected function renderInput()
    {
        $id = $this->generateId("ajaximage-");
        $value = $this->value;

        return <<<EOF
<div class="card" style="margin-bottom: 5px">
    <div class="card-body">
        <div class="row text-center kyanag-form-ajaximage-preview" id="{$id}-preview" style="display: none">
            <div class="d-flex justify-content-center align-items-center w-100">
                <img style="max-height: 200px" src="{$value}" title="点击图片预览">
            </div>
        </div>
        <div class="row text-center kyanag-form-ajaximage-card" title="点击上传" id="{$id}-card">
            <div class="d-flex justify-content-center align-items-center w-100 btn">
                <div style="color:#aaa">
                    <h1>+</h1>
                    <h3>点击上传</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="input-group">
    <input type="text" id="{$id}" {$this->renderAttributes($this->getAttributes())}>
    <div class="input-group-append">
        <button class="btn btn-primary kyanag-form-ajaximage-selector" id="{$id}-selector" type="button"><span>选择</span></button>
        <button class="btn btn-info" id="{$id}-clear" type="button"><span>清空</span></button>
    </div>
</div>
EOF;
    }

}