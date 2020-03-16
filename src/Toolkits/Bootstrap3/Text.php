<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\randomString;

class Text implements InputComponent, Renderable
{

    protected $name;

    protected $label;

    protected $error = "11";

    protected $help;

    protected $value;

    public function __construct($name, $label = null)
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setValue($value)
    {
        $this->value = $value;
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
      <input type="text" name="{$this->name}" id="form-{$id}" class="form-control">
    </div>
    <p class="col-sm-6 help-block">{$helpText}</p>
  </div>
TPL;
        return $tpl;
    }
}