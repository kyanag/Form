<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 10:23
 */

namespace Kyanag\Form\Widgets;


use Kyanag\Form\Element;
use Kyanag\Form\ElementFactory;
use Kyanag\Form\Interfaces\Renderable;

class FormButtonGroup implements Renderable
{

    public function render()
    {
        $buttonGroup = [
            ElementFactory::create(Button::class, [
                'type' => "submit",
                'class' => "btn btn-primary",
                'label' => "提交",
            ])->render(),
            ElementFactory::create(Button::class, [
                'type' => "reset",
                'class' => "btn btn-primary btn btn-default",
                'label' => "重置",
            ])->render()
        ];
        $buttonStr = implode("", $buttonGroup);
        return <<<EOF
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">{$buttonStr}</div>
 </div>
EOF;
    }
}