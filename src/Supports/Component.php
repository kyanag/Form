<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Interfaces\ComponentInterface;
use Kyanag\Form\Traits\VariableTrait;

abstract class Component implements ComponentInterface
{
    use VariableTrait;


    protected $label;

    protected $name;

    protected $help;


    /**
     * @param string $help
     */
    public function setHelp($help){
        $this->help = $help;
    }

    /**
     * @param $label
     */
    public function setLabel($label){
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}