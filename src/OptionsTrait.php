<?php


namespace Kyanag\Form;


/**
 * Trait OptionsTrait
 * @package Kyanag\Form
 * @mixin Component
 */
trait OptionsTrait
{

    /**
     * @var array [ {value} => {label}]
     */
    public $options = [];


    public function isSelected($option, $index)
    {
        $value = (array)($this->value);
        return in_array($option['value'], $value);
    }

}