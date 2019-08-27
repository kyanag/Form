<?php
namespace Kyanag\Form;


function toUnderScore($str)
{
    $dstr = preg_replace_callback('/([A-Z]+)/', function($matchs) {
        return '_'.strtolower($matchs[0]);
    },$str);
    return trim(preg_replace('/_{2,}/','_',$dstr),'_');
}

function fieldMappings(){

    $basepath = ".";
    $files = glob("{$basepath}/src/Fields/*");

    $_ = [];

    foreach ($files as $file){
        $name = str_replace(".php", "", basename($file));
        $className = __NAMESPACE__ . "\\Fields\\{$name}";

        $_[toUnderScore($name)] = $className;
    }
    return $_;
}