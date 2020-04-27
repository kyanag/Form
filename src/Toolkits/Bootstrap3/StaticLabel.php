<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\randomString;
use Kyanag\Form\Contracts\Component;

class StaticLabel extends Component implements ComponentInterface, Renderable
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

        $helpText = $this->help;

        $tpl = <<<TPL
<div class="form-group">
    <label for="form-{$id}" class="col-sm-2 control-label">{$this->label}</label>
    <div class="col-sm-4">
      <p class="form-control-static">{$this->value}</p>
    </div>
    <p class="col-sm-6 help-block">{$helpText}</p>
 </div>
TPL;
        return $tpl;
    }

}