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

    public function testGetAttributes(){
        $targetAttributes = [
            "@id" => Text::class,
            "id" => "test-text",
            "name" => "username",
        ];
        /** @var Text $text */
        $text = object_create($targetAttributes);
        $attributes = $text->getAttributes();

    }
}