<?php


namespace Kyanag\Form;

use Kyanag\Form\Interfaces\FormInterface;
use Kyanag\Form\Interfaces\InputComponent;

class FormBuilder implements InputComponent,FormInterface
{

    protected $form;

    /** @var array<string, InputComponent>  */
    protected $elements = [];

    public function __construct(FormInterface $form)
    {
        $this->form = $form;
    }

    public function text($name, $label = null)
    {
        return $this->__call(__METHOD__, [$name, $label]);
    }

    public function textarea($name, $label = null)
    {
        return $this->__call(__METHOD__, [$name, $label]);
    }

    public function file($name, $label = null)
    {
        return $this->__call(__METHOD__, [$name, $label]);
    }

    public function radio($name, $label = null, $options = [])
    {
        return $this->__call(__METHOD__, [$name, $label, $options]);
    }

    public function select($name, $label = null, $options = [])
    {
        return $this->__call(__METHOD__, [$name, $label, $options]);
    }

    public function checkbox($name, $label = null, $options = [])
    {
        return $this->__call(__METHOD__, [$name, $label, $options]);
    }

    public function setValue($value)
    {
        /** @var InputComponent $element */
        foreach ($this->elements as $name => $element){
            if(isset($value[$name])){
                $element->setValue($value[$name]);
            }
        }
    }

    public function __call($name, $arguments)
    {
        $element = call_user_func_array([$this->form, $name], $arguments);
        if($element instanceof InputComponent){
            //第一个参数就是控件名称
            $elementName = $arguments[0];
            $this->elements[$elementName] = $element;
        }
        return $element;
    }

    public function render()
    {
        return $this->toForm()->render();
    }

    public function built(){
        return $this->form;
    }
}