<?php


namespace Kyanag\Form;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Interfaces\FormInterface;
use Kyanag\Form\Traits\ComponentCollectionAdapterTrait;

class ActiveForm implements ComponentCollectionInterface, FormInterface
{
    use ComponentCollectionAdapterTrait;

    /**
     * @var ElementInterface
     */
    protected $element;

    /** @var ComponentCollectionInterface  */
    protected $componentCollection;

    /**
     * Form constructor.
     * @param ComponentCollectionInterface $componentProvider data提供器
     * @param FormInterface $element  htmlRender提供
     */
    public function __construct(ComponentCollectionInterface $componentProvider, FormInterface $element)
    {
        $this->componentCollection = $componentProvider;
        $this->element = $element;
    }

    /**
     * @return ComponentCollectionInterface
     */
    public function getComponentCollection()
    {
        return $this->componentCollection;
    }

    /**
     * @return ElementInterface|FormInterface
     */
    public function getElementCollection()
    {
        return $this->element;
    }

    public function setMethod($method, $override = false)
    {
        $this->getElementCollection()->setMethod($method, $override);
    }

    public function setAction($action)
    {
        $this->getElementCollection()->setAction($action);
    }

    public function setEnctype($enctype)
    {
        $this->getElementCollection()->setEnctype($enctype);
    }

    public function render()
    {
        return $this->getElementCollection()->render();
    }
}