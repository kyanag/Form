<?php


namespace Kyanag\Form\Core;


abstract class Element
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $label;

    /**
     * @var mixed
     */
    public $value;

    /**
     * @var string
     */
    public $help;

    /**
     * @var string
     */
    public $error;

    /**
     * @var string
     */
    public $class;

    /**
     * @var string
     */
    public $style = null;

    /**
     * @var string
     */
    public $placeholder = null;

    /**
     * @var bool
     */
    public $multiple = false;

    /**
     * @var bool
     */
    public $disable = false;

    /**
     * @var bool
     */
    public $readonly = false;

    /**
     * html@data
     * @var array
     */
    public $dataset = [];

}