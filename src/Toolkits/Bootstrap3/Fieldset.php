<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentCollectionInterface;
use Kyanag\Form\Supports\Component;
use Kyanag\Form\Supports\Element;
use Kyanag\Form\Traits\ActiveFormTrait;

class Fieldset extends Component implements ComponentCollectionInterface
{

    use ActiveFormTrait;

    /**
     * @var Element
     */
    protected $form;

    public function __construct($name = null, $label = null)
    {
        $this->name = $name;
        $this->label = $label ?: $name;
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