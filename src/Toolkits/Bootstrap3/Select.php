<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\randomString;
use function Kyanag\Form\renderOptions;

class Select implements InputComponent, Renderable
{
    protected $name;

    protected $label;

    protected $error;

    protected $help;

    protected $value;

    protected $options = [];

    public function __construct($name, $label = null, $options = [])
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
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

        $options = renderOptions($this->options);

        $tpl = <<<TPL
<div class="form-group {$hasError}">
    <label for="form-{$id}" class="col-sm-2 control-label">{$this->label}</label>
    <div class="col-sm-10">
      <select name="{$this->name}" id="form-{$id}" class="form-control">{$options}</select>
    </div>
    <p class="col-sm-6 help-block">{$helpText}</p>
  </div>
TPL;
        return $tpl;
    }
}