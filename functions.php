<?php
namespace Kyanag\Form;



function array_first($items, $callable){
    foreach ($items as $index => $item){
        if(call_user_func_array($callable, [$item, $index])){
            return $item;
        }
    }
    return null;
}

function array_map($items, $callable){
    foreach ($items as $index => $item){
        $items[$index] = call_user_func_array($callable, [$item, $index]);
    }
    return $items;
}


function toUnderScore($str)
{
    $dstr = preg_replace_callback('/([A-Z]+)/', function($matchs) {
        return '_'.strtolower($matchs[0]);
    },$str);
    return trim(preg_replace('/_{2,}/','_',$dstr),'_');
}

function randomString($prefix = null){
    return uniqid($prefix);
}