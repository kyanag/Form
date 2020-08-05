<?php


namespace Kyanag\Form\Tests\Tabler;


use Kyanag\Form\Tabler\Forms\File;
use Kyanag\Form\Tabler\ElementFactory;
use Kyanag\Form\Tests\Factory;
use Kyanag\Form\Tests\TestCase;

class TableFactoryTest extends TestCase
{
    /** @var ElementFactory */
    public $tablerFactory;

    protected function setUp()
    {
        parent::setUp();
        $this->tablerFactory = Factory::makeTableFactory();
    }

    public function testCreateElement(){

    }
}