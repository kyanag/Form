<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/2
 * Time: 22:55
 */

namespace Kyanag\Form\Traits;


trait WidgetAttribute
{
    protected function renderAttributes($attributes){
        $items = [];
        foreach($attributes as $name => $value){
            $items[] = $this->renderAttr($name, $value);
        }
        return implode(" ", $items);
    }

    protected function renderAttr($name, $value){
        if($name == "data"){
            $items = [];
            foreach($value as $name => $val){
                $items[] = $this->renderAttr("data-{$name}", $val);
            }
            return implode(" ", $items);
        }else if(is_bool($value) or is_null($value)){
            return $value === true ? $name : null;
        }else if(is_array($value)){
            $str = implode(" ", $value);
            return "{$name}=\"{$str}\"";
        }else{
            return "{$name}=\"{$value}\"";
        }
    }
}