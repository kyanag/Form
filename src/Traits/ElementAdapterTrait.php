<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;

trait ElementAdapterTrait
{

    /**
     * @return ElementInterface
     */
    abstract public function getElement();

    public function addRenderable(Renderable $renderable)
    {
        $this->getElement()->addRenderable($renderable);
    }
}