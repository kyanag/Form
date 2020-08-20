<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;
use Kyanag\Form\OptionsTrait;
use Kyanag\Form\Supports\HtmlRenderer;

class Select extends Component
{

    use OptionsTrait;

    public function render()
    {
        return <<<TPL
<div class="form-group">
    <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
    <select class="form-control custom-select {$this->renderClass()} {$this->withNamespace("select")}" name="{$this->showName()}" {$this->renderAttributes()}>
      {$this->renderOptions()}
    </select>
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
                        'value' => $option['value'],
                        'selected' => $this->isSelected($option, $value),
                        'disabled' => boolval(@$option['disabled']),
                        'data' => [
                            'data' => @$option['data']
                        ],
                    ];
                    $attributeString = HtmlRenderer::renderAttributes($attributes);
                    return "<option {$attributeString}>{$option['text']}</option>";
                }
            )
        );
    }
}
