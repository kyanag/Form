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
        $value = (array)($this->value);
        return in_array($index, $value);
    }
}
