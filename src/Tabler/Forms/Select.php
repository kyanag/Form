<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\OptionComponent;
use Kyanag\Form\Supports\HtmlRenderer;

class Select extends OptionComponent
{


    public function render()
    {
        return <<<TPL
<div class="form-group">
    <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
    <select class="form-control custom-select" name="{$this->showName()}" {$this->showReadonly()} {$this->showDisabled()}>
      {$this->renderOptions()}
    </select>
</div>
TPL;
    }


    protected function renderOptions(){
        return implode("\n", \Kyanag\Form\array_map($this->options, function($option, $value){
            if(!is_array($option)){
                $option = [
                    'text' => $option,
                    'value' => $value,
                ];
            }

            $attributes = [
                'value' => $option['value'],
                'selected' => $this->isSelected($option, $value),
                'disabled' => boolval(@$option['disabled']),
                'data' => [
                    'data' => @$option['data']
                ],
            ];
            $attributeString = HtmlRenderer::renderAttributes($attributes);
            return "<option {$attributeString}>{$option['text']}</option>";
        }));
    }
}