<?php


namespace Kyanag\Form;

use Kyanag\Form\Supports\HtmlRenderer;

abstract class Component implements Renderable
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
     * @var array|string
     */
    public $class = [];

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
     * @var array<static>
     */
    public $children = [];

    /**
     * 扩展属性
     *
     * @var array
     */
    public $properties = [];

    /**
     * @var callable
     */
    public $valueFormat = "htmlspecialchars";

    /**
     * 选择器前缀
     * @var string
     */
    public $selectorPrefix = "oneform-";

    /**
     * 值域
     * @var null|string
     */
    public $valueDomain = null;

    /**
     * @var Component
     */
    protected $parentComponent;


    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        /** @var Component $child */
        foreach ($this->children as $child) {
            $lastKeyPos = strrpos($child->getName(), ".");
            $lastKeyPos = ($lastKeyPos === false) ? -1 : $lastKeyPos;
            $indexKey = substr($child->getName(), $lastKeyPos + 1);

            $child->setValue(data_get($value, $indexKey));
        }
    }

    /**
     * @param bool $withDomain 是否携带valueDomain
     * @return string
     */
    public function getName($withDomain = false)
    {
        if($withDomain === true && $this->valueDomain !== "" && is_string($this->valueDomain)){
            return "{$this->valueDomain}.{$this->name}";
        }
        return $this->name;
    }


    public function showName()
    {
        $name = trim($this->getName(true), ".");
        if(strpos($name, ".") !== false){
            $_ = explode(".", $name);
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

    public function getChildren($id)
    {
        return array_first(
            $this->children,
            function ($item, $index) use ($id) {
                return $item->id == $id;
            }
        );
    }

    public function addChild(Component $item, $strict = true)
    {
        if($strict === true){
            $item->valueDomain = $this->getName();
            $item->parentComponent = $this;
        }
        $this->children[] = $item;
    }


    protected function renderAttributes(){
        $attributes = [
            'id' => $this->showId(),
            'style' => $this->style,
            'placeholder' => $this->placeholder,
            'multiple' => $this->multiple,
            'disable' => $this->disable,
            'readonly' => $this->readonly,
            'data' => $this->dataset
        ];

        $attributes = array_filter($attributes, function($value){
            return $value !== null;
        });
        return HtmlRenderer::renderAttributes($attributes);
    }


    protected function renderClass(){
        return implode(" ", (array)$this->class);
    }


    /**
     * @param string $name
     * @return string
     */
    protected function withSelectorPrefix($name){
        return "{$this->selectorPrefix}{$name}";
    }


    protected function showLabel()
    {
        return ($this->label === null ? $this->name : $this->label);
    }

    protected function showValue()
    {
        return call_user_func($this->valueFormat, $this->value !== null ? $this->value : $this->default);
    }

    protected function showDisabled()
    {
        return $this->disable === true ? "disabled" : null;
    }

    protected function showReadonly()
    {
        return $this->readonly === true ? "readonly" : null;
    }

    protected function showClass(){
        return $this->class;
    }

    protected function showId()
    {
        return $this->id;
    }

    abstract public function render();

    public function renderJs(){
        return "";
    }
}
