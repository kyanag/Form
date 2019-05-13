<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/28
 * Time: 18:18
 */

namespace Kyanag\Form;

use Kyanag\Form\Interfaces\Renderable;

/**
 * Class Field
 * @package app\fields
 */
abstract class Field implements Renderable
{
    static protected $count = 1;

    protected $_index;

    protected $_template = <<<EOF
<div class="form-group row">{label}<div class="col-sm-8">{input}{error}{help}</div></div>
EOF;

    public $labelAttributes = [
        'class' => ["col-sm-2", "col-form-label"],
    ];

    public $errorAttributes = [
        'class' => ['invalid-feedback'],
    ];

    public $helpAttributes = [
        'class' => ["form-text", "text-muted"],
    ];

    /**
     * 控件id
     * @var string
     */
    public $id;
    /**
     * 控件name
     * @var string
     */
    public $name;

    /**
     * @var string|array|number
     */
    public $value;

    /**
     * 控件其他属性
     * @var array
     */
    public $attributes = [];

    public $class = ['form-control'];

    /**
     * 标签
     * @var string
     */
    public $label;

    public $help;

    public $error;
    /**
     * @var bool
     */
    public $reanonly;
    /**
     * @var bool
     */
    public $disabled;
    /**
     * @var bool
     */
    public $autofocus;
    /**
     * @var bool
     */
    public $required;

    public $title;

    public $data;

    public function __construct()
    {
        $this->_index = static::$count++;
    }

    public function template($template){
        $this->_template = $template;
        return $this;
    }

    abstract protected function renderInput();

    protected function renderLabel(){
        $label = $this->label ?: $this->name;
        $labelAttributes = $this->labelAttributes;
        $labelAttributes['for'] = $this->id;
        return "<label {$this->renderAttributes($labelAttributes)}>{$label}</label>";
    }

    protected function renderError(){
        $hasError = !is_null($this->error);
        if($hasError){
            return "<div {$this->renderAttributes($this->errorAttributes)}>{$this->error}</div>";
        }
        return '';
    }

    protected function renderHelp(){
        $hasHelp = !is_null($this->help);
        if($hasHelp){
            return "<small {$this->renderAttributes($this->helpAttributes)}>{$this->help}</small>";
        }
        return '';
    }

    /**
     * @return string
     */
    public function render(){
        $parts = [];
        $parts["{label}"] = $this->renderLabel();
        $parts["{help}"] = $this->renderHelp();
        $parts["{error}"] = $this->renderError();
        $parts["{input}"] = $this->renderInput();
        return strtr($this->_template, $parts);
    }

    public function getDefaultAttributes(){
        return [
            'id' => $this->id,
            'name' => $this->getNameAttribute(),
            'value' => $this->value,
            'class' => $this->class,
            'readonly' => $this->reanonly,
            'disabled' => $this->disabled,
            'autofocus' => $this->autofocus,
            'data' => $this->data,
        ];
    }

    public function getNameAttribute(){
        if(is_string($this->name)){
            $names = explode(".", $this->name);
        }else if(is_array($this->name)){
            $names = $this->name;
        }else{
            $names = (array)$this->name;
        }
        if(count($names) == 1){
            return $names[0];
        }
        $first = array_shift($names);
        return "{$first}[" . implode("][", $names) . "]";
    }

    public function getExtraAttributes(){
        return [];
    }

    public function getAttributes(){
        $defaultAttributes = $this->getDefaultAttributes();
        $extraAttributes = $this->getExtraAttributes();
        return array_merge($this->attributes, $defaultAttributes, $extraAttributes);
    }

    public function getAttributesNames(){
        return array_keys($this->getDefaultAttributes(), $this->getExtraAttributes());
    }

    protected function renderAttributes(array $attributes){
        $items = [];
        foreach($attributes as $name => $value){
            if(!is_null($value)){
                $items[] = $this->renderAttr($name, $value);
            }
        }
        return implode(" ", $items);
    }

    protected function renderAttr($name, $value){
        if($name == "data"){
            return $this->renderDataAttr("data", $value);
        }else if(is_bool($value) or is_null($value)){
            return $value === true ? $name : null;
        }else if(is_array($value)){
            $str = implode(" ", $value);
            return "{$name}=\"{$str}\"";
        }else{
            return "{$name}=\"{$value}\"";
        }
    }

    protected function renderDataAttr($name, $value){
        $items = [];
        if(is_array($value)){
            foreach ($value as $index => $val){
                $items[] = $this->renderDataAttr("{$name}-{$index}", $val);
            }
        }else{
            $items[] = "{$name}=\"{$value}\"";;
        }
        return implode(" ", $items);
    }

    public function setAttr($name, $value = null){
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttr($name){
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }
}