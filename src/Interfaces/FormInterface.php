<?php


namespace Kyanag\Form\Interfaces;


interface FormInterface
{

    /**
     * @param $method
     * @param bool $override
     */
    public function setMethod($method, $override = false);

    public function setAction($action);

    public function setEnctype($enctype);

}