<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;
use Kyanag\Form\OptionsTrait;
use Kyanag\Form\Supports\HtmlRenderer;

class Radio extends Component
{

    use OptionsTrait;

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

    protected function renderOptions()
    {
        return implode(
            "\n",
            \Kyanag\Form\array_map(
                $this->options,
                function ($option, $value) {
                    if (!is_array($option)) {
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
<label class="custom-control custom-radio custom-control-inline">
  <input type="radio" class="custom-control-input {$this->renderClass()} {$this->withSelectorPrefix("radio")}" {$attributeString}>
  <span class="custom-control-label">{$option['text']}</span>
</label>
TPL;
                }
            )
        );
    }
}
