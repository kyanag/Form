<?php


namespace Kyanag\Form;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\MultiInputComponent;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\InputComponentTrait;
use Kyanag\Form\Traits\MultiInputComponentTrait;

class Form implements MultiInputComponent
{

    use MultiInputComponentTrait{
        addComponent as addComponentFormTrait;
    }

    /** @var ElementInterface */
    protected $element;

    public function __construct(ElementInterface $element)
    {
        $this->element = $element;
    }

    public function addComponent(InputComponent $component)
    {
        $this->addComponentFormTrait($component);
        $this->addElement($component->toRenderable());
        return $component;
    }

    public function addElement(Renderable $renderable)
    {
        $this->element->addElement($renderable);
    }

    public function toRenderable()
    {
        return $this->element;
    }

    public function getName()
    {
        return null;
    }

    public function setLabel($label)
    {
        //pass
    }

    public function setHelp($help)
    {
        //pass
    }
}