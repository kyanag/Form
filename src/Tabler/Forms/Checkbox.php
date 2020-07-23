<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\OptionComponent;
use Kyanag\Form\Supports\HtmlRenderer;

class Checkbox extends OptionComponent
{

    public function render()
    {

        return <<<TPL
<div class="form-group">
  <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
  <div class="custom-controls-stacked">
    {$this->renderOptions()}
  </div>
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
                'name' => $this->showName(),
                'value' => $option['value'],
                'checked' => $this->isSelected($option, $value),
                'disabled' => boolval(@$option['disabled'])
            ];
            $attributeString = HtmlRenderer::renderAttributes($attributes);

            return <<<TPL
<label class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" class="custom-control-input" {$attributeString}>
  <span class="custom-control-label">{$option['text']}</span>
</label>
TPL;
        }));
    }

}