<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/17
 * Time: 22:15
 */

namespace Kyanag\Form\Tests;


use Kyanag\Form\Element;
use Symfony\Component\DomCrawler\Crawler;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{

    public function createCrawler($html){
        $dom = new \Symfony\Component\DomCrawler\Crawler();
        $dom->addHtmlContent($html);
        return $dom->filterXPath("//body/*");
    }

    public function assertAttributeEq($html, $attr, $value){
        $this->assertEquals($this->createCrawler($html)->attr($attr), $value);
    }

    public function assertTagName($html, $tagName){

    }

    public function assertValue($input, $name){

    }

}