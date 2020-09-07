<?php


namespace Kyanag\Form\Tests;

use Kyanag\Form\Components\Decorators\Div;
use Kyanag\Form\Components\ElementFactory;
use Kyanag\Form\Components\FormSection;

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

        $factory->registerComponent("form-section", FormSection::class);

        $factory->registerComponent("decorator-column", Div::class);
        return $factory;
    }

}