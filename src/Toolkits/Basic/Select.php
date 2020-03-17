<?php


namespace Kyanag\Form\Toolkits\Basic;


use Kyanag\Form\Supports\Element;
use function Kyanag\Form\renderOptions;

class Select extends Text
{

    protected $options;

    public function __construct($name, $label = null, $options = [])
    {
        parent::__construct($name, $label);
        $this->options = $options;
    }

    protected function getElement(){
        $optionStr = $this->renderOptions();

        return new Element(
            "select",
            [
                'name' => $this->name,
            ],
            Element::E_CLOSE_DOUBLE,
            [
                $optionStr
            ]
        );
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
        return implode("\n", $_);
    }

    protected function selected($value){
        if(is_array($this->value)){
            return in_array($value, $this->value);
        }
        return $value == $this->value;
    }

}