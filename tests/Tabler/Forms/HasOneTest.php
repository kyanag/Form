<?php


namespace Kyanag\Form\Tests\Tabler\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;
use Kyanag\Form\Tabler\Forms\HasOne;
use Kyanag\Form\Tabler\ElementFactory;
use Kyanag\Form\Tests\Factory;
use Kyanag\Form\Tests\TestCase;

class HasOneTest extends TestCase
{
    /** @var ElementFactory */
    public $tablerFactory;

    protected function setUp()
    {
        parent::setUp();
        $this->tablerFactory = Factory::makeTableFactory();
    }


    public function testSetValue(){
        /** @var HasOne $hasOne */
        $hasOne = $this->tablerFactory->createElement("has-one", [
            'name' => "article",
            'label' => "文章附表",
            'children' => [
                $this->tablerFactory->createElement("textarea", [
                    'name' => "article.content",
                    'label' => "文章主体",
                ]),
                $this->tablerFactory->createElement("text", [
                    'name' => "article.created_at",
                    'label' => "创建时间",
                ]),
            ],
        ]);
        var_dump($hasOne);
    }

}