<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\ElementTrait;

class Element implements ElementInterface
{

    use ElementTrait;

    const E_CLOSE_SINGLE = 0;   //单闭和标签
    const E_CLOSE_DOUBLE = 1;   //双闭合标签

    protected $tagName;

    protected $closeType = 1;   //默认双闭合

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

    protected function renderStart(){
        return implode(" ", [
            "<{$this->tagName}",
            $this->renderAttributes(),
            ($this->closeType == 1 ? ">": "/>")
        ]);
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