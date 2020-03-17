<?php


namespace Kyanag\Form\Traits;


trait InputComponentTrait
{

    protected $label;

    protected $value;

    protected $name;

    protected $help;

    protected $error;

    /**
     * @param mixed $value
     */
    public function setValue($value){
        $this->value = $value;
    }

    /**
     * @param string $help
     */
    public function setHelp($help){
        $this->help = $help;
    }

    /**
     * @param string $error
     */
    public function setError($error){
        $this->error = $error;
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


}