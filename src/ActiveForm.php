<?php


namespace Kyanag\Form;


use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\FormInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\ActiveFormTrait;

class ActiveForm implements ComponentCollectionInterface, FormInterface
{

    use ActiveFormTrait;

    /**
     * Form constructor.
     * @param ComponentCollectionInterface $componentProvider data提供器
     * @param FormInterface $element  htmlRender提供
     */
    public function __construct(ComponentCollectionInterface $componentProvider, FormInterface $element)
    {
        $this->componentCollection = $componentProvider;
        $this->form = $element;
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