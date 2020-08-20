<?php


namespace Kyanag\Form\Tests;


class Helper
{

    public static function call($object, $method, $args = []){
        $refObject = new \ReflectionObject($object);

        /** @var \ReflectionMethod $methodRef */
        $methodRef = $refObject->getMethod($method);

        $methodRef->setAccessible(\ReflectionMethod::IS_PUBLIC);

        return $methodRef->invokeArgs($object, $args);
    }

}