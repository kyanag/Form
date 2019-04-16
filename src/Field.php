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

    protected $_parts = [];

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

    public $value;

    public $attributes = [];

    public $class = ['form-control'];

    public $label;

    public $help = null;

    public $error;

    public $reanonly;

    public $disabled;

    public $autofocus;

    public $required;

    public $title;

    public function __construct()
    {
        $this->_index = static::$count++;
        $this->init();
    }

    public function init(){

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
        $this->_parts["{label}"] = $this->renderLabel();
        $this->_parts["{help}"] = $this->renderHelp();
        $this->_parts["{error}"] = $this->renderError();
        $this->_parts["{input}"] = $this->renderInput();

        return strtr($this->_template, $this->_parts);
    }

    public function getDefaultAttributes(){
        return $defaultAttributes = array_filter([
            'id' => $this->id,
            'name' => $this->getNameAttribute(),
            'value' => $this->value,
            'class' => $this->class,
            'readonly' => $this->reanonly,
            'disabled' => $this->disabled,
            'autofocus' => $this->autofocus,
        ], function($item){
            return !is_null($item);
        });
    }

    public function getNameAttribute(){
        if(is_string($this->name)){
            $names = explode(".", $this->name);
            if(count($names) == 1){
                return $names[0];
            }
            $first = array_shift($names);
            return "{$first}[" . implode("][", $names) . "]";
        }
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

    protected function renderAttributes($attributes = null){
        $attributes = !is_null($attributes) ? $attributes : $this->getAttributes();

        $items = [];
        foreach($attributes as $name => $value){
            $items[] = $this->renderAttr($name, $value);
        }
        return implode(" ", $items);
    }

    protected function renderAttr($name, $value){
        if($name == "data"){
            $items = [];
            foreach($value as $name => $val){
                $items[] = $this->renderAttr("data-{$name}", $val);
            }
            return implode(" ", $items);
        }else if(is_bool($value) or is_null($value)){
            return $value === true ? $name : null;
        }else if(is_array($value)){
            $str = implode(" ", $value);
            return "{$name}=\"{$str}\"";
        }else{
            return "{$name}=\"{$value}\"";
        }
    }

    public function setAttr($name, $value = null){
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttr($name){
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }
}