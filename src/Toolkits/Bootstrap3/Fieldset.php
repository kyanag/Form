<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Contracts\Component;
use Kyanag\Form\Supports\Element;
use Kyanag\Form\Traits\ActiveFormTrait;
use Kyanag\Form\Traits\ElementTrait;

class Fieldset extends Component implements ComponentCollectionInterface, Renderable
{

    use ActiveFormTrait;
    use ElementTrait;

    /**
     * @var Element
     */
    protected $form;

    public function __construct($name = null, $label = null)
    {
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    public function getElement()
    {
        if(!$this->form){
            $tagName = "fieldset";
            $attributes = [
                'name' => $this->name
            ];
            $closeType = Element::E_CLOSE_DOUBLE;
            $elements = [
                "<legend>{$this->label}</legend>"
            ];
            $this->form = new Element($tagName, $attributes, $closeType, $elements);
        }
        return $this->form;
    }

    public function render()
    {
        $tpl = <<<TPL
<div class="form-group">
    <div class="col-sm-12">{$this->getElement()->render()}</div>
</div>
TPL;
        return $tpl;
    }

    public function toRenderable()
    {
        return $this;
    }
}