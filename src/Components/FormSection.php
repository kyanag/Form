<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;

class FormSection extends Component
{

    public function render()
    {
        return $this->renderChildren();
    }
}