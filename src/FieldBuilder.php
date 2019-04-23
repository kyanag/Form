<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23
 * Time: 14:15
 */

namespace Kyanag\Form;

/**
 * Class FieldBuilder
 * @package Kyanag\Form
 * @method static name(string $name = "")
 */
class FieldBuilder
{

    protected $field;

    protected $name;

    public function __construct(Field $field)
    {
        $this->field = $field;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

//    public function name($name){
//        $this->field-
//    }

    public function label(string $label = null){
        $this->field->label = $label;
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
    }
}