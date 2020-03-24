<?php


namespace Kyanag\Form\Interfaces;


interface ElementInterface extends Renderable
{

    /**
     * @param Renderable $renderable
     * @return Renderable
     */
    public function addElement(Renderable $renderable);

}