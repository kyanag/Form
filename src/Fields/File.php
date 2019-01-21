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

    public $_template = <<<EOF
<div class="form-group row">{label}<div class="col-sm-8"><div class="input-group">{input}{button}{error}</div>{help}</div></div>
EOF;

    public $accepts = [];

    public function __construct(array $config = [])
    {
        !isset($config['id']) && $config['id'] = $this->generateId();
        parent::__construct($config);
    }

    protected function renderInput()
    {

        $this->_parts['{button}'] = $this->renderButton();

        $attributes = $this->_attributes;
        $attributes['type'] = "text";
        $this->_attributes['type'] = "text";
        return "<input {$this->renderAttributes($attributes)}/>";
    }

    protected function renderButton(){
        $upBtnAttributes = [
            'class' => ["btn", "input-group-btn", "btn-primary", "kyanag-forms-upload"],
            'data' => [
                'target' => $this->id,
                'accept' => implode(",", $this->accepts),
            ],
            'type' => "button"
        ];
        $previewBtnAttributes = [
            'class' => ["btn", "input-group-btn", "btn-primary", "kyanag-forms-preview"],
            'data' => [
                'target' => $this->id,
            ],
            'type' => "button"
        ];
        return "<div class=\"input-group-prepend btn-group\"><button {$this->renderAttributes($upBtnAttributes)}>选择文件</button><button {$this->renderAttributes($previewBtnAttributes)}>预览</button></div>";
    }
}