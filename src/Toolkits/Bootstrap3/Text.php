<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\randomString;
use Kyanag\Form\Contracts\Component;

class Text extends Component implements ComponentInterface, Renderable
{

    public function __construct($name, $label = null)
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
    }


    public function toRenderable()
    {
        return $this;
    }

    public function render()
    {
        $id = randomString($this->name);

        $hasError = $this->error ? "has-error" : "";
        $helpText = $this->error ?: $this->help;

        $tpl = <<<TPL
<div class="form-group {$hasError}">
    <label for="form-{$id}" class="col-sm-2 control-label">{$this->label}</label>
    <div class="col-sm-4">
      <input type="text" name="{$this->name}" id="form-{$id}" class="form-control" value="{$this->value}">
    </div>
    <p class="col-sm-6 help-block">{$helpText}</p>
 </div>
TPL;
        return $tpl;
    }
}