<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23
 * Time: 14:15
 */

namespace Kyanag\Form;
use Kyanag\Form\Fields\Select;

/**
 * @method self name(string $name)
 * @method self label(string $label)
 * @method self help(string $help)
 * @method self error(string $error)
 * @method self title(string $title)
 * @method self data(array $data);
 * @method self value(string|array $value);
 * Class FieldBuilder
 * @package Kyanag\Form
 */
class FieldBuilder
{

    protected $field;

    /**
     * FieldBuilder constructor.
     * @param Field|Select $field
     */
    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    public function __call($name, $arguments)
    {
        $this->field->{$name} = $arguments[0];
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
}