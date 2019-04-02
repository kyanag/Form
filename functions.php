<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 13:32
 */
namespace Kyanag\Form;

function object_init($object, $config = []){
    return App::formGlobal()->initObject($object, $config);
}

function object_create($config = []){
    return App::formGlobal()->createObject($config);
}