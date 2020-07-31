<?php


namespace Kyanag\Form;

abstract class OptionComponent extends Component
{
    /**
     * @var array [ {value} => {label}]
     */
    public $options = [];


    public function isSelected($option, $index)
    {
//        var_dump($this->name, $option, $index, $this->value);
//        echo "\n";
        $value = (array)(data_get($this->value, $this->name));
        return in_array($option['value'], $value);
    }
}
