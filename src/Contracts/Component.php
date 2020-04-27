<?php


namespace Kyanag\Form\Contracts;

use Kyanag\Form\Interfaces\ComponentInterface;

abstract class Component implements ComponentInterface
{

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $help;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $error;

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * @param string $help
     */
    public function setHelp($help)
    {
        $this->help = $help;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }


}