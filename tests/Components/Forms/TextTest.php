<?php


namespace Kyanag\Form\Tests\Components\Forms;


use Kyanag\Form\Components\Forms\Text;
use Kyanag\Form\Tests\ComponentTestCase;
use Kyanag\Form\Tests\Factory;

class TextTest extends ComponentTestCase
{

    protected function setUp()
    {
        parent::setUp();

        $this->component = new Text("testName", "testLabel");
    }

    public function testRender(){
        $text = Factory::makeTableFactory()->createElement("text", [
            'id' => "title",
            'name' => "title",
            'label' => "标题"
        ]);

        $html = $text->render();

        $this->assertTrue(true);
    }

}