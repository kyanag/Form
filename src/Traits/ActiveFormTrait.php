<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\FormInterface;
use Kyanag\Form\Interfaces\Renderable;

trait ActiveFormTrait
{

    protected $components = [];

    /**
     * 表单主题
     * @var FormInterface
     */
    protected $form;

    public function addComponent(ComponentInterface $component)
    {
        $this->addElement($component->toRenderable());
        $this->components[] = $component;
    }

    public function getComponents()
    {
        return $this->components;
    }

    public function addElement(Renderable $renderable)
    {
        $this->getElement()->addElement($renderable);
    }

    /**
     * @return FormInterface
     */
    public function getElement()
    {
        return $this->form;
    }
}