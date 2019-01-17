<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


class Radio extends Select
{
    public $subTemplate = '<div class="form-check form-check-inline">{input}{label}</div>';

    public $subAttributes = [
        'class' => [
            'form-check-input'
        ],
    ];

    public $subLabelAttributes = [
        'class' => [
            'form-check-label'
        ],
    ];

    public function renderInput()
    {
        $options = [];
        foreach($this->options as $index => $option){
            $options[] = $this->renderOption($option, $index);
        }
        return implode("", $options);
    }

    protected function renderOption($option, $index){
        $this->subAttributes['type'] = "checkbox";
        $this->subAttributes['id'] = $this->generateId() . "-{$index}";
        $this->subAttributes['value'] = $option['value'];
        $this->subAttributes['checked'] = $this->selected($option['value']);

        $this->subLabelAttributes['for'] = $this->subAttributes['id'];

        $parts = [
            '{input}' => "<input {$this->renderAttributes($this->subAttributes)}/>",
            '{label}' => "<label {$this->renderAttributes($this->subLabelAttributes)}>{$option['text']}</label>",
        ];
        return strtr($this->subTemplate, $parts);
    }
}