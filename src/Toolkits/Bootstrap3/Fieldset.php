<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Supports\Component;
use Kyanag\Form\Supports\Element;
use Kyanag\Form\Supports\ElementAdapter;
use Kyanag\Form\Supports\ElementCollectionProvider;
use Kyanag\Form\Traits\ComponentCollectionAdapterTrait;
use Kyanag\Form\Traits\ElementAdapterTrait;
use Kyanag\Form\Traits\ElementTrait;

class Fieldset extends Component implements ComponentCollectionInterface, ElementInterface
{

    use ComponentCollectionAdapterTrait;

    /** @var ComponentCollectionInterface */
    protected $componentCollection;

    /**
     * @var Element
     */
    protected $element;

    public function __construct(ComponentCollectionInterface $componentCollection, $name = null, $label = null)
    {
        $this->componentCollection = $componentCollection;
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    public function getElement()
    {
        if(!$this->element){
            $tagName = "fieldset";
            $attributes = [
                'name' => $this->name
            ];
            $closeType = Element::E_CLOSE_DOUBLE;
            $elements = [
                "<legend>{$this->label}</legend>"
            ];

            $this->element = new Element($tagName, $attributes, $closeType, $elements);
        }
        return $this->element;
    }

    public function getComponentCollection()
    {
        return $this->componentCollection;
    }

    public function render()
    {
        $tpl = <<<TPL
<div class="form-group">
    <div class="col-sm-11 col-sm-offset-1">{$this->getElement()->render()}</div>
</div>
TPL;
        return $tpl;
    }

    public function toRenderable()
    {
        return $this;
    }
}