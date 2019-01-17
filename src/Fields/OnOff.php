<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


class OnOff extends Radio
{

    static $name = "开关";

    protected $options = [
        [
            'value' => 1,
            'name' => "是",
        ],
        [
            'value' => 0,
            'name' => "否",
        ]
    ];

    public function isProperty($name, $value = null)
    {
        if($name == "options"){
            return false;
        }
        return true;
    }
}