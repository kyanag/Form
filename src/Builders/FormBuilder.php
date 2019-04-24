<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/24
 * Time: 13:54
 */

namespace Kyanag\Form\Builders;;

use Kyanag\Form\Widgets\Form;

/**
 * Class FormBuilder
 * @package Kyanag\Form
 * @property Form field
 */
class FormBuilder extends NestedFormBuilder
{

    public function __construct(Form $field)
    {
        parent::__construct($field);
    }

    public function action($action){
        $this->field->action = $action;
        return $this;
    }

    public function method($method = "post"){
        $this->field->method = $method;
        return $this;
    }

    public function enctype($enctype){
        $this->field->enctype = $enctype;
        return $this;
    }

}