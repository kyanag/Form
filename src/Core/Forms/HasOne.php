<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class HasOne extends Component
{

    public function render()
    {
        return <<<TPL
<fieldset class="{$this->renderClass()} {$this->withSelectorPrefix("hasone")}">
    <legend class="border-bottom">{$this->showLabel()}</legend>
    {$this->renderChildren()}
</fieldset>
TPL;
    }
}
