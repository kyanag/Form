<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 13:32
 */
namespace Kyanag\Form;


use function foo\func;
use Kyanag\Form\Traits\Configurable;

function object_init($object, $config = []){
    foreach($config as $name => $value){
        $object->$name = $value;
    }
    return $object;
}

function object_create($class, $config = []){
    $field = new $class();
    object_init($field, $config);
    return $field;
}