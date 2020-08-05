<?php


namespace Kyanag\Form\Tests;


use Kyanag\Form\Tabler\Forms\File;
use Kyanag\Form\Tabler\ElementFactory;

class Factory
{

    public static function makeTableFactory(){
        $factory = new ElementFactory();

        $files = glob(src_path("Tabler/Forms/*.php"));
        foreach($files as $file){
            $classBaseName = basename($file, ".php");

            $snake_str = cmal_to_snake($classBaseName);
            $class = "Kyanag\\Form\\Tabler\\Forms\\{$classBaseName}";

            $factory->registerComponent($snake_str, $class);
        }
        return $factory;
    }

}