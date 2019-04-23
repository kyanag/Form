<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class OnOff extends Radio
{

    public $options = [
        [
            'value' => 1,
            'name' => "是",
        ],
        [
            'value' => 0,
            'name' => "否",
        ]
    ];

}