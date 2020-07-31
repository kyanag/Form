<?php


namespace Kyanag\Form\Tabler\Forms;

use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class HasOne extends Component
{

    public function render()
    {
        $childrenHtml = HtmlRenderer::renderComponents($this->children);
        return <<<TPL
<fieldset>
    <legend class="border-bottom">{$this->showLabel()}</legend>
    {$childrenHtml}
</fieldset>
TPL;
    }
}
