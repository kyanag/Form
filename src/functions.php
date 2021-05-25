<?php
namespace Kyanag\Form;


function toHtmlName($name, $multiple = false){
    if(strpos($name, ".") !== false){
        $_ = explode(".", $name);
        $name = array_shift($_);
        foreach ($_ as $str){
            $name .= "[{$str}]";
        }
    }
    if($multiple){
        $name .= "[]";
    }
    return $name;
}