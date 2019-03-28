<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/17
 * Time: 22:15
 */

namespace Kyanag\Form\Tests;

use Kyanag\Form\Field;
use Kyanag\Form\Interfaces\Renderable;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * Class TestCase
 * @package Kyanag\Form\Tests
 */
abstract class TestCase extends PHPUnitTestCase
{

    public function createCrawler($html){
        $dom = new \Symfony\Component\DomCrawler\Crawler();
        $dom->addHtmlContent($html);
        return $dom->filterXPath("//body/*");
    }

    public function getAttributes(Field $element){
        $attributes = $this->createCrawler($element->render())->getNode(0)->attributes;
        $array = [];
        /**
         * @var  $name
         * @var \DOMAttr $attribute
         */
        foreach ($attributes as $name => $attribute){
            $array[$attribute->name] = $attribute->value;
        }
        return $array;
    }

    public static function assertAttribute($attr, $targetAttr){
        $attr = is_array($attr) ? implode(" ", $attr) : $attr;
        $targetAttr = is_array($targetAttr) ? implode(" ", $targetAttr) : $targetAttr;
        static::assertEquals($attr, $targetAttr);
    }
}