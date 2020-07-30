<?php

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

if(!function_exists("data_get")){

    function data_get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }
        $key = is_array($key) ? $key : explode('.', $key);

        while (! is_null($segment = array_shift($key))) {
//            if ($segment === '*') {
//                if ($target instanceof Collection) {
//                    $target = $target->all();
//                } elseif (! is_array($target)) {
//                    return value($default);
//                }
//
//                $result = Arr::pluck($target, $key);
//
//                return in_array('*', $key) ? Arr::collapse($result) : $result;
//            }
            if(is_array($target))

            if (Arr::accessible($target) && Arr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }
        return $target;
    }
}