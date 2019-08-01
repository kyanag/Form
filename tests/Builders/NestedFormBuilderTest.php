<?php


namespace Kyanag\Form\Tests\Builders;


use Kyanag\Form\Builders\FieldBuilder;
use Kyanag\Form\Builders\NestedFormBuilder;
use Kyanag\Form\Fields\Text;
use Kyanag\Form\Tests\TestCase;
use Kyanag\Form\Widgets\Form;

/**
 * Class NestedFormBuilderTest
 * @package Kyanag\Form\Tests\Builders
 */
class NestedFormBuilderTest extends TestCase
{

    protected function newNestedFormBuilder(){
        return new NestedFormBuilder(new Form());
    }

    protected function getField($fieldBuilder){
        $ref = new \ReflectionObject($fieldBuilder);

        $refProperty = $ref->getProperty("field");
        $refProperty->setAccessible(true);

        return $refProperty->getValue($fieldBuilder);
    }

    public function testText(){
        $formBuilder = $this->newNestedFormBuilder();
        $fieldBuilder = $formBuilder->text("test", "测试");

        $this->assertTrue($fieldBuilder instanceof FieldBuilder);

        $this->assertTrue($this->getField($fieldBuilder) instanceof Text);
    }

    public function testRegister(){
        NestedFormBuilder::register("noname", Text::class);

        $formBuilder = $this->newNestedFormBuilder();
        $fieldBuilder = $formBuilder->noname("test", "测试");

        $this->assertTrue($this->getField($fieldBuilder) instanceof Text);
    }
}