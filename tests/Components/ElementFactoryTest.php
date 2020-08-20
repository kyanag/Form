<?php


namespace Kyanag\Form\Tests\Components;


use Kyanag\Form\Components\Forms\File;
use Kyanag\Form\Components\ElementFactory;
use Kyanag\Form\Tests\Factory;
use Kyanag\Form\Tests\TestCase;

class ElementFactoryTest extends TestCase
{
    /** @var ElementFactory */
    public $factory;

    protected function setUp()
    {
        parent::setUp();
        $this->factory = Factory::makeTableFactory();
    }

    public function testCreateElement(){
        $this->assertTrue(true);
    }
}