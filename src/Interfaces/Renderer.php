<?php


namespace Kyanag\Form\Interfaces;


use Kyanag\Form\Interfaces\Element;

interface Renderer
{
    /**
     * @param $type
     * @param Element $element
     * @return string
     */
    public function render($type, Element $element);
}