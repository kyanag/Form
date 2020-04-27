<?php


namespace Kyanag\Form\Interfaces;


interface ComponentInterface
{

    /**
     * @param string $help
     */
    public function setHelp($help);

    /**
     * @param $label
     */
    public function setLabel($label);

    /**
     * @return Renderable
     */
    public function toRenderable();

    /**
     * @param $name
     * @return string
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param mixed $value
     */
    public function setValue($value);


    /**
     * @param mixed $error
     */
    public function setError($error);
}