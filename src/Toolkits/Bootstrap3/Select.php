<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\randomString;
use function Kyanag\Form\renderOptions;
use Kyanag\Form\Contracts\Component;

class Select extends Component implements ComponentInterface, Renderable
{

    protected $options = [];

    public function __construct($name, $label = null, $options = [])
    {
        $label = $label ?: $name;

        $this->label = $label;
        $this->name = $name;
        $this->options = $options;
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

        $options = $this->renderOptions();

        $tpl = <<<TPL
<div class="form-group {$hasError}">
    <label for="form-{$id}" class="col-sm-2 control-label">{$this->label}</label>
    <div class="col-sm-4">
        <select name="{$this->name}" id="form-{$id}" class="form-control">{$options}</select>
    </div>
    <p class="col-sm-6 help-block">{$helpText}</p>
</div>
TPL;
        return $tpl;
    }

    protected function renderOptions(){
        $_ = [];
        foreach ($this->options as $value => $text){
            if(is_array($text)){
                $optgroup_options = renderOptions($text);
                $_[] = "<optgroup label=\"{$value}\">{$optgroup_options}</optgroup>";
            }else{
                $selectedValue = $this->selected($value) ? "selected" : "";
                $_[] = "<option value=\"{$value}\" {$selectedValue}>{$text}</option>";
            }
        }
        return implode("", $_);
    }

    protected function selected($value){
        if(is_array($this->value)){
            return in_array($value, $this->value);
        }
        return $value == $this->value;
    }
}