<?php
namespace Kyanag\Form;


function renderAttributes($attributes)
{
    $_ = [];
    foreach ($attributes as $name => $value) {
        if($value !== null){
            $_[] = renderAttribute($name, $value);
        }
    }
    return implode(" ", $_);
}

function renderAttribute($name, $value)
{
    if (is_bool($value)) {
        return $value ? $name : "";
    }
    if (is_array($value)) {
        $value = implode(" ", $value);
    }
    return "{$name}=\"{$value}\"";
}