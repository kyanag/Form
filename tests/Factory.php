<?php


namespace Kyanag\Form\Tests;

use Kyanag\Form\Components\ElementFactory;

class Factory
{

    public static function makeTableFactory(){
        $factory = new ElementFactory();

        $files = glob(src_path("Components/Forms/*.php"));
        foreach($files as $file){
            $classBaseName = basename($file, ".php");

            $snake_str = \Kyanag\Form\camelToSnake($classBaseName);
            $class = "Kyanag\\Form\\Components\\Forms\\{$classBaseName}";

            $factory->registerComponent($snake_str, $class);
        }
        return $factory;
    }

}