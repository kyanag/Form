<?php
namespace Kyanag\Form;


function toUnderScore($str)
{
    $dstr = preg_replace_callback('/([A-Z]+)/', function($matchs) {
        return '_'.strtolower($matchs[0]);
    },$str);
    return trim(preg_replace('/_{2,}/','_',$dstr),'_');
}

function renderOptions($options, $selectedValue = null){
    $_ = [];
    foreach ($options as $value => $text){
        if(is_array($text)){
            $optgroup_options = renderOptions($text);
            $_[] = "<optgroup label=\"{$value}\">{$optgroup_options}</optgroup>";
        }else{
            $selectedValue = $value == $selectedValue ? "selected" : "";
            $_[] = "<option value=\"{$value}\" {$selectedValue}>{$text}</option>";
        }
    }
    return implode("\n", $_);
}

function randomString($prefix = null){
    return uniqid($prefix);
}