<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\randomString;
use Kyanag\Form\Supports\Component;

class Textarea extends Component implements ComponentInterface, Renderable
{

    public function __construct($name, $label = null)
    {
        $this->name = $name;
        $this->label = $label ?: $name;
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
        <textarea class="form-control" id="form-{$id}" rows="3" name="{$this->name}">{$this->value}</textarea>
    </div>
    <p class="col-sm-6 help-block">{$helpText}</p>
 </div>
TPL;
        return $tpl;
    }
}