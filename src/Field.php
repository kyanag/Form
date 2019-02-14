<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/28
 * Time: 18:18
 */

namespace Kyanag\Form;


/**
 * Class Field
 * @package app\fields
 * @property $id
 * @property $name
 * @property $value
 * @property $label
 * @property $error
 * @property $help
 */
abstract class Field extends Element
{
    static protected $count = 1;

    protected $_index;

    public $_template = <<<EOF
<div class="form-group row">{label}<div class="col-sm-8">{input}{error}{help}</div></div>
EOF;

    protected $_attributes = [
        'class' => ['form-control'],
    ];

    public $labelAttributes = [
        'class' => ["col-sm-2", "col-form-label"],
    ];

    public $errorAttributes = [
        'class' => ['invalid-feedback'],
    ];

    public $helpAttributes = [
        'class' => ["form-text", "text-muted"],
    ];

    protected $_parts = [];

    public $label;

    public $help;

    public $error;

    public function __construct()
    {
        $this->_index = static::$count++;
    }

    public function setTemplate($template){
        $this->_template = $template;
    }

    public function generateId(){
        $this->id = uniqid("a") . $this->_index;
        return $this->id;
    }

    protected function renderInput(){
        return "";
    }

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
}