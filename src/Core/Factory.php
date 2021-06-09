<?php


namespace Kyanag\Form\Core;

use League\Plates\Engine;

class Factory
{

    public static function createRenderer()
    {
        return new Renderer(static::createEngine());
    }

    public static function createEngine()
    {
        $tpl_path = __DIR__ . "/templates/bootstrap4";
        return new Engine($tpl_path);
    }
}
