<?php


namespace Kyanag\Form\Interfaces;


interface VariableInterface
{

    /**
     * @param mixed $value
     */
    public function setValue($value);


    /**
     * @param mixed $error
     */
    public function setError($error);

}