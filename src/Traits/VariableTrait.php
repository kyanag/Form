<?php


namespace Kyanag\Form\Traits;


trait VariableTrait
{

    protected $value;

    protected $error;

    /**
     * @param mixed $value
     */
    public function setValue($value){
        $this->value = $value;
    }


    /**
     * @param string $error
     */
    public function setError($error){
        $this->error = $error;
    }
}