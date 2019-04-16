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

    public $namespace = null;

    public function pushPart(Renderable $part){
        $this->parts[] = $part;
    }

    /**
     * @param array $value
     */
    public function setValue($value)
    {
        $this->value = (array)$value;
    }

    protected function renderInput()
    {
        return implode("", array_map(function(Renderable $field){
            if($field instanceof Field){
                $name = $field->name;
                $value = $this->getPartValue($name);
                if(!is_null($value)){
                    $field->value = $value;
                }
            }
            return $field->render();
        }, $this->parts));
    }

    protected function getPartValue($name){
        if(isset($this->value[$name])){
            return $this->value[$name];
        }else{
            return null;
        }
    }

    protected function buildName($path, $is_){

    }
}