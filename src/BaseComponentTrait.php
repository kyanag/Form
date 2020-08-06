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
     * @var array|string
     */
    public $class = null;

    /**
     * @var string
     */
    public $style = null;

    /**
     * @var string
     */
    public $placeholder = null;

    /**
     * 默认值
     * @var mixed
     */
    public $default = null;

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

    /**
     * @var callable
     */
    public $valueFormat = "htmlspecialchars";

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
        if($this->multiple){
            $name .= "[]";
        }
        return $name;
    }

    protected function showValue()
    {
        return call_user_func($this->valueFormat, $this->value);
    }

    protected function showDisabled()
    {
        return $this->disable === true ? "disabled" : null;
    }

    protected function showReadonly()
    {
        return $this->readonly === false ? "readonly" : null;
    }

    protected function showId()
    {
        return $this->id;
    }
}
