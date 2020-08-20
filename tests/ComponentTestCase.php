<?php


namespace Kyanag\Form\Tests;


use Kyanag\Form\Component;

/**
 * Class ComponentTestCase
 * @package Kyanag\Form\Tests
 */
abstract class ComponentTestCase extends TestCase
{

    /**
     * @var Component
     */
    public $component;


    public function testGetValue(){
        $this->assertTrue($this->component->value === $this->component->getValue());
    }

    public function testSetValue(){
        $values = [
            "1001",
            1,
            null,
            new \stdClass()
        ];
        foreach ($values as $value){
            $this->component->setValue($value);

            $this->assertTrue($this->component->getValue() === $value);
        }
    }


    public function testGetName(){
        $names = [
            "abc",
            'abc.index',
        ];
        foreach ($names as $name){
            $this->component->name = $name;

            $this->assertTrue($this->component->getName() === $name);
        }
    }

    public function testAddChild(){
        $this->assertTrue(true);
    }

    public function testGetChildren(){
        $this->assertTrue(true);
    }


    public function testShowLabel(){
        $name = $label = "label";
        $this->component->name = $name;
        $this->component->label = $label;

        $this->assertTrue(Helper::call($this->component, "showLabel") === $label);

        $this->component->label = null;

        $this->assertTrue(Helper::call($this->component, "showLabel") === $name);
    }

    public function testShowName(){
        $names = [
            "a" => "a",
            "a.b" => "a[b]",
            "a.b." => "a[b]",
            "a.b.c" => "a[b][c]"
        ];
        foreach ($names as $key => $value){
            $this->component->name = $key;

            $this->assertTrue(Helper::call($this->component, "showName") === $value);
        }

        $this->component->multiple = true;
        $this->assertTrue(Helper::call($this->component, "showName") === "{$value}[]");
    }

    public function testShowValue(){
        $value = "<h1>OneCMS</h1>";
        $this->component->value = $value;

        $showedValue = call_user_func($this->component->valueFormat, $value);
        $this->assertTrue(Helper::call($this->component, "showValue") === $showedValue);
    }

    public function testShowDisabled(){
        $this->component->disable = true;
        $this->assertTrue(Helper::call($this->component, "showDisabled") === "disabled");

        $this->component->disable = false;
        $this->assertTrue(Helper::call($this->component, "showDisabled") === null);
    }

    public function testShowReadonly(){
        $this->component->readonly = true;
        $this->assertTrue(Helper::call($this->component, "showReadonly") === "readonly");

        $this->component->readonly = false;
        $this->assertTrue(Helper::call($this->component, "showReadonly") === null);
    }

    public function testShowId(){
        $this->component->id = "my-element1";

        $this->assertTrue(Helper::call($this->component, "showId") === "my-element1");
    }
}