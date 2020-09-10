<?php


namespace Kyanag\Form\Tests;


use function Kyanag\Form\array_first;
use function Kyanag\Form\array_has;

class FunctionTestCase extends TestCase
{

    public function testArrayHas(){
        $array = [
            'a' => 1,
            'b' => null,
            "c" => "",
            'd' => 0,
            'e' => new \stdClass()
        ];

        foreach ($array as $key => $_){
            $this->assertTrue(array_has($array, $key));
        }

        $this->assertFalse(array_has($array, "f"));
    }


    public function testArrayFist(){
        $array = [
            'a' => 1,
            'b' => null,
            "c" => "",
            'd' => 0,
            'e' => new \stdClass()
        ];

        $this->assertTrue(array_first($array, function($value, $index){
            return $value;
        }) == 1);
    }
}