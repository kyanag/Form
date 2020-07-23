<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Renderable;

class HtmlRenderer
{

    public static function renderAttributes($attributes){
        $_ = [];
        foreach ($attributes as $name => $value){
            if($__ = static::renderAttribute($name, $value)){
                $_[] = $__;
            }
        }
        return implode(" ", $_);
    }

    protected static function renderAttribute($name, $value){
        if($name == "data"){
            $value = (array)$value;
            return static::renderDatas($value);
        }else{
            if(is_bool($value)){
                return $value ? "{$name}={$name}" : "";
            }
            if(is_array($value)){
                $value = implode(" ", $value);
            }
            return "{$name}=\"{$value}\"";
        }
    }

    protected static function renderDatas($datas){
        $datas = array_filter($datas);
        return implode(" ", \Kyanag\Form\array_map($datas, function($data, $name){
            if(is_array($data)){
                $data = json_encode($data);
            }
            return "data-{$name}='{$data}'";
        }));
    }

    /**
     * @param array<Renderable> $components
     */
    public static function renderComponents($components){
        return implode(" ", \Kyanag\Form\array_map($components, function ($component, $index){
            return $component->render();
        }));
    }
}