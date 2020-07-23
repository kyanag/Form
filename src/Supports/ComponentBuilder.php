<?php


namespace Kyanag\Form\Supports;

use Kyanag\Form\Component;
/**
 * Class ComponentBuilder
 * @package Kyanag\Form
 *
 * @method void setDisabled(bool $disable = false)
 * @method static setOptions(array $options)
 */
class ComponentBuilder
{

    protected $component;

    public function __construct(Component $component)
    {
        $this->component = $component;
    }



    public function setHelp($help = null){
        $this->component->help = $help;
    }

    public function setError($error){
        $this->component->error = $error;
    }


    public function built(){
        return $this->component;
    }

    public function setProperty($name, $value){
        if(property_exists($this->component, $name)){
            $this->component->{$name} = $value;
        }else if(property_exists($this->component->getAttributes(), $name)){
            $this->component->getAttributes()->{$name} = $value;
        }else{
            $this->component->properties[$name] = $value;
        }
        return $this;
    }

    public function getProperty($name){
        if(property_exists($this->component, $name)){
            return $this->component->{$name};
        }else if(property_exists($this->component->getAttributes(), $name)){
            return $this->component->getAttributes()->{$name};
        }else{
            return $this->component->properties[$name];
        }
    }

    public function setChildren($children){
        $this->component->children = $children;
        return $this;
    }

    public function __set($name, $value)
    {
        return $this->setProperty($name, $value);
    }

    public function __call($name, $arguments)
    {
        if(strtolower(substr($name, 0, 3)) == "set"){
            $name = lcfirst(substr($name, 3));
            return $this->setProperty($name, $arguments[0]);
        }
    }
}