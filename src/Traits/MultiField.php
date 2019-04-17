<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16
 * Time: 11:22
 */

namespace Kyanag\Form\Traits;


use Kyanag\Form\Field;
use Kyanag\Form\Interfaces\Renderable;

/**
 * Trait MultiField
 * @package Kyanag\Form\Traits
 * @mixin Field
 */
trait MultiField
{
    protected $parts = [];

    public function pushPart(Renderable $part){
        $this->parts[] = $part;
    }

    /**
     * @param array $value
     */
    public function setValue($value)
    {
        $this->value = (array)$value;
        foreach ($this->parts as $part){
            $name = $part->name;
            if(isset($this->value[$name])){
                $part->value = $this->value[$name];
            }
        }
    }

    protected function renderInput()
    {
        return implode("", array_map(function(Renderable $field){
            return $this->renderPart($field);
        }, $this->parts));
    }

    protected function renderPart(Renderable $part){
        if($part instanceof Field){
            $part = clone $part;    //可以多次输出
            $part->name = $this->formatPartName($part);
        }
        return $part->render();
    }

    protected function formatPartName($part){
        if($this->name){
            return "{$this->name}.{$part->name}";
        }else{
            return $part->name;
        }
    }
}