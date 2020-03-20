<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\MultiInputComponent;
use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\ElementTrait;
use Kyanag\Form\Traits\InputComponentTrait;
use Kyanag\Form\Traits\MultiInputComponentTrait;

class Fieldset implements MultiInputComponent,ElementInterface
{
    use MultiInputComponentTrait;
    use ElementTrait;

    protected $name;

    protected $label;

    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label ?: $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function render()
    {

        $fieldset = implode("\n", [
            "<fieldset name=\"{$this->name}\">",
            "<legend>{$this->label}</legend>",
            implode("\n", array_map(function($element){
                return $element->render();
            }, $this->elements)),
            "</fieldset>",
        ]);
        $tpl = <<<TPL
<div class="form-group">
    <div class="col-sm-11 col-sm-offset-1">{$fieldset}</div>
</div>
TPL;
        return $tpl;
    }

    public function toRenderable()
    {
        return $this;
    }

    public function getBody()
    {
        return $this;
    }
}