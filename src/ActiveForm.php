<?php


namespace Kyanag\Form;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\ComponentCollectionAdapterTrait;
use Kyanag\Form\Traits\ElementAdapterTrait;

class ActiveForm implements ComponentCollectionInterface, ElementInterface
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
     * @param ElementInterface $element  htmlRender提供
     */
    public function __construct(ComponentCollectionInterface $componentProvider, ElementInterface $element)
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

    public function getElement()
    {
        return $this->element;
    }

    public function render()
    {
        return $this->getElement()->render();
    }
}