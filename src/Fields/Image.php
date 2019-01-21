<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;

class Image extends File
{

    public $accepts = [".png", ".jpeg", ".gif", ".jpg"];


    protected function renderButton(){
        $upBtnAttributes = [
            'class' => ["btn", "input-group-btn", "btn-primary", "kyanag-forms-upload"],
            'data' => [
                'target' => $this->id,
                'accept' => implode(",", $this->accepts),
            ],
            'type' => "button"
        ];
        return "<div class=\"input-group-prepend btn-group\"><button {$this->renderAttributes($upBtnAttributes)}>选择文件</button></div>";
    }
}