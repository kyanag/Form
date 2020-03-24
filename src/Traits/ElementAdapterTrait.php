<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;

trait ElementAdapterTrait
{

    /**
     * @return ElementInterface
     */
    abstract public function getElementCollection();

    public function addElement(Renderable $renderable)
    {
        $this->getElementCollection()->addElement($renderable);
    }
}