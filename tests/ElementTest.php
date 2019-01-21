<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/17
 * Time: 22:09
 */

namespace Kyanag\Form\Tests;


use Kyanag\Form\FieldManager;
use PHPUnit\Framework\TestCase;

class ElementTest extends TestCase
{
    public function testSetTagName(){

        $element = new \Kyanag\Form\BaseElement();
        $element->setTagName("a");

        $this->assertAttributeEq($element->render(), "name", null);
    }
}