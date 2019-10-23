<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23
 * Time: 14:15
 */

namespace Kyanag\Form\Builders;

use Kyanag\Form\Field;

/**
 * @method self label(string $label)
 * @method self help(string $help)
 * @method self title(string $title)
 * @method self data(array $data);
 * @property string name
 * Class FieldBuilder
 * @package Kyanag\Form
 */
class FieldBuilder
{

    protected $field;

    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    public function __call($name, $arguments)
    {
        $this->field->{$name} = $arguments[0];
        return $this;
    }

    public function __get($name)
    {
        return $this->field->{$name};
    }

    public function name($name){
        $this->field->name = $name;
        return $this;
    }

    public function error($error){
        $this->field->error = $error;
        return $this->addClass("is-invalid");
    }

    public function value($value){
        if(isset($this->field->multiple) && $this->field->multiple){
            $value = (array)$value;
        }
        $this->field->value = $value;
        return $this;
    }

    public function readonly(){
        $this->field->reanonly = true;
        return $this;
    }

    public function autofocus(){
        $this->field->autofocus = true;
        return $this;
    }

    public function required(){
        $this->field->required = true;
        return $this;
    }

    public function disabled(){
        $this->field->disabled = true;
        return $this;
    }

    public function multiple(){
        $this->field->multiple = true;
        return $this;
    }

    public function options(array $options){
        $this->field->options = $options;
        return $this;
    }

    public function addClass($class){
        if(!is_array($this->field->class)){
            $this->field->class = (array)$this->field->class;
        }
        $this->field->class[] = $class;
        return $this;
    }

    public function ajax($url){
        $options = [
            'url' => $url,
        ];
        return $this->jsOptions($options);
    }

    public function jsOptions($options){
        if(is_null($this->field->data)){
            $this->field->data = [];
        }
        $this->field->data = array_merge($this->field->data, [
            'js-options' => base64_encode(json_encode($options)),
        ]);
        return $this;
    }

    public function toField(){
        return $this->field;
    }

    /**
     * @return $this
     */
    public function disableLabel(){
        $this->field->template("<div class=\"form-group row\"><div class=\"col-sm-12\">{input}{error}{help}</div></div>");
        return $this;
    }
}