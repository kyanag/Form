<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 10:23
 */

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Widgets\BaseElement;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\object_create;

class FormButtonGroup implements Renderable
{

    public function render()
    {
        $buttonGroup = [
            object_create(BaseElement::class, [
                'tagName' => "button",
                'type' => "submit",
                'class' => "btn btn-primary",
                'html' => "提交",
            ])->render(),
            object_create(BaseElement::class, [
                'tagName' => "button",
                'type' => "reset",
                'class' => "btn btn-primary btn btn-default",
                'html' => "重置",
            ])->render(),
        ];
        $buttonStr = implode(" ", $buttonGroup);
        return <<<EOF
<div class="form-group row">
    <div class="col-sm-offset-2 col-sm-8 text-center">{$buttonStr}</div>
 </div>
EOF;
    }
}