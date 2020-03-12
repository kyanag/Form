<?php


namespace Kyanag\Form\Interfaces;


interface FormBodyInterface extends Renderable
{

    public function addElement(Renderable $renderable);

}