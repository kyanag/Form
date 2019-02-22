<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/22
 * Time: 14:34
 */

namespace Kyanag\Form\Tests\Fields;


use Kyanag\Form\Fields\Text;
use function Kyanag\Form\object_create;
use Kyanag\Form\Tests\TestCase;

class TextTest extends TestCase
{

    public function testRenderInput(){
        $attributes = [
            'name' => "username"
        ];

        $text = object_create(Text::class, $attributes);

        $this->assertTagName($text->renderInput(), "input");

        $this->assertAttributeEq($text->renderInput(), "name", "username");

        $this->assertHasAttribute($text->renderInput(), "ttt");

        $text->ttt = "123";
        $this->assertAttributeEq($text->renderInput(), "ttt", "123");
        $text->ttt = null;

        $this->assertHasAttribute($text->renderInput(), "ttt");
    }

}