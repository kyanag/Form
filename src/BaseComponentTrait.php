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
     * html@data
     * @var array
     */
    public $dataset = [];

    /**
     * @var callable
     */
    public $valueFormat = "htmlspecialchars";

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
     *
     * @var array
     */
    public $properties = [];


    protected function showLabel()
    {
        return $this->label === null ? $this->name : $this->label;
    }

    protected function showName()
    {
        $name = $this->name;
        if(strpos($this->name, ".") !== false){
            $_ = explode(".", $this->name);
            $name = array_shift($_);
            foreach ($_ as $str){
                $name .= "[{$str}]";
            }
        }
        if($this->attribute->multiple){
            $name .= "[]";
        }
        return $name;
    }

    protected function showValue()
    {
        return call_user_func($this->valueFormat, data_get($this->value, $this->name));
    }

    protected function showDisabled()
    {
        return $this->attribute->disable ? "disabled" : null;
    }

    protected function showReadonly()
    {
        return $this->attribute->readonly ? "readonly" : null;
    }

    protected function showId()
    {
        return $this->id;
    }
}
