<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/17
 * Time: 22:09
 */

namespace Kyanag\Form\Tests;

use Kyanag\Form\ElementFactory;

/**
 * Class ElementTest
 * @package Kyanag\Form\Tests
 */
class ElementTest extends TestCase
{
    public function testSetTagName(){

        $attributes = [
            'href' => "http://www.baidu.com",
        ];

        $element = new \Kyanag\Form\BaseElement();
        $element->setTagName("a");

        $this->assertAttributeEq($element->render(), "name", null);
        $this->assertTagName($element->render(), "a");

        ElementFactory::init($element, $attributes);

        foreach ($attributes as $name => $value){
            $this->assertAttributeEq($element->render(), $name, $value);
        }
    }
}