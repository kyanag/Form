<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class FormSection extends Component
{

    public function render()
    {
        return HtmlRenderer::renderComponents($this->children);
    }
}