<?php


namespace Kyanag\Form\Interfaces;


interface Renderer
{
    /**
     * @param $type
     * @param Element $element
     * @return string
     */
    public function render($type, Element $element);
}