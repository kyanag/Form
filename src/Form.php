<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/23
 * Time: 21:55
 */

namespace Kyanag\Form;


class Form extends Element
{
    /**
     * @var Element[]
     */
    protected $children = [];

    protected function isProperty($name, $value = null)
    {
        return !in_array($name, ["children"]);
    }

    public function addElement(Element $element){
        $this->children[] = $element;
    }

    protected function innerHTML(){
        return implode("", array_map(function(Element $element){
            return $element->render();
        }, $this->children));
    }

    public function render(){
        $attributes = $this->getAttributes();
        return "<form {$this->renderAttributes($attributes)}>{$this->innerHTML()}</form>";
    }

    public function load($data){
        foreach ($this->children as $element){
            if($element instanceof Field){
                $name = $element->name;
                if(isset($data[$name])){
                    $element->value = $data[$name];
                }
            }
        }
        return $this;
    }
}