<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 16:30
 */

function getColumns(){
    return [
        [
            'label' => "模型名称",
            'name' => "title",
            'help' => "最少两个字符",
            'field_class' => \Kyanag\Form\Fields\Text::class,
        ],
        [
            'label' => ""
        ]
    ];
}