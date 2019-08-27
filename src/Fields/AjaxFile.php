<?php


namespace Kyanag\Form\Fields;


class AjaxFile extends File
{
    public $accept = "*/*";

    public function getExtraAttributes()
    {
        return [
            'accept' => $this->accept,
            'class' => array_merge($this->class, ['kyanag-form-ajaxfile']),
            'name' => $this->name,
        ];
    }

    protected function generateId($pre){
        return uniqid($pre);
    }

    protected function renderInput()
    {
        $id = $this->generateId("ajaxfile-");
        return <<<EOF
<div class="card" style="margin-bottom: 5px">
    <div class="card-body">
        <div class="row text-center file-preview-zone kyanag-form-ajaxfile-card" id="{$id}-card">
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
        <button class="btn btn-primary kyanag-form-ajaxfile-selector" id="{$id}-selector"><span>选择</span></button>
        <button class="btn btn-info" id="{$id}-clear"><span>清空</span></button>
    </div>
</div>
EOF;
    }
}