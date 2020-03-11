<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Interfaces\Renderable;

class Element implements Renderable
{
    const E_CLOSE_SINGLE = 0;   //单闭和标签
    const E_CLOSE_DOUBLE = 1;   //双闭合标签

    protected $tagName;

    protected $attributes = [];

    protected $closeType = 1;   //默认双闭合

    /** @var array<Element>  */
    protected $elements = [];

    /**
     * Element constructor.
     * @param string $tagName
     * @param array $attributes
     * @param int $closeType
     * @param array $elements
     */
    public function __construct($tagName, $attributes = [], $closeType = 1, $elements = [])
    {
        $this->tagName = $tagName;
        $this->attributes = $attributes;
        $this->closeType = $closeType;
        $this->elements = $elements;
    }

    public function setAttribute($name, $attribute){
        $this->attributes[$name] = $attribute;
    }

    protected function renderStart(){
        return implode(" ", [
            "<{$this->tagName}",
            $this->renderAttributes(),
            ($this->closeType == 1 ? ">": "/>")
        ]);
    }

    protected function renderAttributes(){
        $_ = [];
        foreach ($this->attributes as $name => $value){
            $_ = $this->renderAttribute($name, $value);
        }
        return implode(" ", $_);
    }

    protected function renderAttribute($name, $value){
        if($name == "data"){
            //TODO
            return "";
        }else{
            if(is_bool($value)){
                return $name;
            }
            if(is_array($value)){
                $value = implode(" ", $value);
            }
            return "{$name}=\"{$value}\"";
        }
    }

    protected function renderElements(){
        return implode("", array_map(function($element){
            if(is_string($element)){
                return $element;
            }if($element instanceof Renderable){
                return $element->render();
            }else{
                return (string)$element;
            }
        }, $this->elements));
    }

    protected function renderEnd(){
        if($this->closeType == static::E_CLOSE_DOUBLE){
            return "</{$this->tagName}>";
        }
        return "";
    }

    public function render()
    {
        return implode("", [
            $this->renderStart(),
            $this->renderElements(),
            $this->renderEnd()
        ]);
    }
}