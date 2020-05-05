<?php


namespace Kyanag\Form;


use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Traits\ActiveFormTrait;
use Kyanag\Form\Traits\ElementTrait;

class ActiveForm implements ComponentCollectionInterface, ElementInterface
{

    use ActiveFormTrait;
    use ElementTrait;

    /**
     * Form constructor.
     * @param ElementInterface $element  htmlRender提供
     */
    public function __construct(ElementInterface $element)
    {
        $this->element = $element;
    }

    public function setMethod($method, $override = false)
    {
        $this->getElement()->setMethod($method, $override);
    }

    public function setAction($action)
    {
        $this->getElement()->setAction($action);
    }

    public function setEnctype($enctype)
    {
        $this->getElement()->setEnctype($enctype);
    }

    public function render()
    {
        return $this->getElement()->render();
    }
}