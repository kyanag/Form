<?php


namespace Kyanag\Form\Interfaces;

interface Renderer
{
    /**
     * @param Element $element
     * @return string
     */
    public function render(Element $element);
}
