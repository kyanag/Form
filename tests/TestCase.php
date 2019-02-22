<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/17
 * Time: 22:15
 */

namespace Kyanag\Form\Tests;

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

    public function assertAttributeEq($html, $attr, $value){
        $this::assertEquals($this->createCrawler($html)->attr($attr), $value);
    }

    public function assertHasAttribute($html, $attr){
        $this::assertNull($this->createCrawler($html)->attr($attr));
    }

    public function assertTagName($html, $tagName){
        static::assertEquals($this->createCrawler($html)->nodeName(), $tagName);
    }

    public function assertInnerHtml($input, $name){

    }

}