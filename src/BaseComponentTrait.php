<?php


namespace Kyanag\Form;


trait BaseComponentTrait
{
    /**
     * @var Component
     */
    protected $parentComponent;

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
     * @var string
     */
    public $component;

    /**
     * @var mixed
     */
    public $value;


    public $help;


    public $error;

    /**
     * @var callable
     */
    public $valueFilter = "htmlspecialchars";

    /**
     * @var Attributes
     */
    protected $attribute;

    /**
     * @var array<static>
     */
    public $children = [];

    /**
     * 扩展属性
     * @var array
     */
    public $properties = [];


    protected function showLabel(){
        return $this->label;
    }

    protected function showName(){
        return $this->name;
    }

    protected function showValue(){
        return call_user_func($this->valueFilter, $this->value);
    }

    protected function showDisabled(){
        return $this->attribute->disable ? "disabled" : null;
    }

    protected function showReadonly(){
        return $this->attribute->readonly ? "readonly" : null;
    }

    protected function showId(){
        return $this->id;
    }
}