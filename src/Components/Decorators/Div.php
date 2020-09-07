<?php


namespace Kyanag\Form\Components\Decorators;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class Div extends Component
{

    public function render()
    {
        return <<<EOF
<div class="{$this->renderClass()}">
    {$this->renderChildren()}
</div>
EOF;

    }
}