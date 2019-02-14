<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 10:04
 */

namespace Kyanag\Form;


class ElementFactory
{

    public static function create($class, $config = []){
        /** @var Field $field */
        $field = new $class();
        static::init($field, $config);
        if(isset($config['error']) && $config['error']){
            $field->addClass("is-invalid");
        }
        return $field;
    }

    public static function init($object, $properties = []){
        foreach($properties as $property => $value){
            $object->{$property} = $value;
        }
        return $object;
    }
}