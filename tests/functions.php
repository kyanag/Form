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
            'label' => '主键',
            'name' => "id",
            '@id' => \Kyanag\Form\Fields\Hidden::class,
        ],
        [
            'label' => "新闻标题",
            'name' => "title",
            'help' => "最少两个字符",
            '@id' => \Kyanag\Form\Fields\Text::class,
        ],
        [
            'label' => "所属栏目",
            'name' => "category_id",
            'help' => "选择所属栏目",
            '@id' => \Kyanag\Form\Fields\Select::class,
            'options' => [
                ['value' => 0, "name" => "根"],
                ['value' => 1, 'name' => " - 关于我们"],
                ['value' => 2, 'name' => " - - 公司简介"],
            ],
        ],
        [
            'label' => "简介",
            'name' => "desc",
            'help' => "简介",
            '@id' => \Kyanag\Form\Fields\Textarea::class,
        ],
        [
            'label' => "标签",
            'name' => "tags",
            'help' => null,
            '@id' => \Kyanag\Form\Fields\Checkbox::class,
            'options' => [
                ['value' => 1, 'name' => "首页"],
                ['value' => 2, 'name' => '推荐']
            ],
        ],
        [
            'label' => "关键词",
            'name' => "keywords",
            '@id' => \Kyanag\Form\Fields\Select2::class,
            'options' => [
                ['value' => 0, "name" => "显示"],
                ['value' => 1, "name" => "不显示"],
            ],
        ],
        [
            'label' => "内容模板",
            'name' => "tpl",
            'help' => "内容模板",
            '@id' => \Kyanag\Form\Fields\Select::class,
            'options' => [
                ['value' => "./content.html", "name" => "content.html"],
            ],
        ],
        [
            'label' => "发布时间",
            'name' => "created_at",
            'help' => "发布时间",
            '@id' => \Kyanag\Form\Fields\Datetime::class,
        ],
        [
            'label' => "封面图",
            'name' => "bg_img",
            'help' => "文章封面图",
            '@id' => \Kyanag\Form\Fields\Image::class,
        ],
        [
            'label' => "正文",
            'name' => "context",
            'id' => "abc1",
            'help' => "富文本内容",
            '@id' => \Kyanag\Form\Fields\Editor::class,
        ],
        [
            'label' => "状态",
            'name' => "status",
            'help' => "在前台页面显不显示",
            '@id' => \Kyanag\Form\Fields\Radio::class,
            'options' => [
                ['value' => 0, "name" => "显示"],
                ['value' => 1, "name" => "不显示"],
            ],
        ],
    ];
}


function array_sort($array, $func = "sort"){
    $func($array);
    return $array;
}