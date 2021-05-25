<?php


namespace Kyanag\Form\Interfaces;


use Kyanag\Form\Core\Element;

interface Renderer
{
    /**
     * @param $type
     * @param Element $element
     * @return string
     */
    public function render($type, Element $element);
}