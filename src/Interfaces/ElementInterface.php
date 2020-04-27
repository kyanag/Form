<?php


namespace Kyanag\Form\Interfaces;


interface ElementInterface extends Renderable
{
    public function addElement(Renderable $renderable);
}