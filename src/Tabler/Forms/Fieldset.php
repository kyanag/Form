<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class Fieldset extends Component
{

    public function render()
    {

        $childrenHtml = HtmlRenderer::renderComponents($this->children);
        return <<<TPL
<fieldset>
    <legend>{$this->showName()}</legend>
    {$childrenHtml}
</fieldset>
TPL;
    }

}