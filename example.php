<?php


if(strtolower($_SERVER['REQUEST_METHOD']) != "get"){
    var_dump($_REQUEST);exit();
}

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
require "./vendor/autoload.php";

$plate = new \League\Plates\Engine("./src/Core/templates/bootstrap4/");
$renderer = new \Kyanag\Form\Core\Renderer($plate);

$element = new \Kyanag\Form\Core\ArrayElement([
    'name' => "name",
    'label' => "名称",
]);

$elements = [
    [
        'type' => "input",
        'name' => "name",
        'label' => "名称",
    ],
    [
        'type' => "password",
        'name' => "password",
        'label' => "密码",
    ],
    [
        'type' => "switch",
        'name' => "remember_me",
        'label' => "记住我",
        'id' => "switch",
        'help' => "session长期有效",
        'value' => 0
    ],
    [
        'type' => "textarea",
        'name' => "desc",
        'label' => "本次登录感想",
        'id' => "textarea",
        'help' => "本次登录感想",
    ],
    [
        'type' => "range",
        'name' => "range",
        'label' => "验证是否机器人",
        'value' => 89,
        'id' => "range-robot",
        'help' => "1+88=?",
        'min' => "",
    ],
    [
        'type' => "checkbox",
        'name' => "region",
        'label' => "地区",
        'id' => "region",
        'help' => "选择地区",
        'value' => "华南",
        'options' => [
            [
                'title' => "华中",
                'value' => "华中"
            ],
            [
                'title' => "华南",
                'value' => "华南"
            ],
            [
                'title' => "华北",
                'value' => "华北"
            ],
            [
                'title' => "东北",
                'value' => "东北"
            ],
            [
                'title' => "西北",
                'value' => "西北"
            ]
        ],
    ],
    [
        'type' => "radio",
        'name' => "region",
        'label' => "地区",
        'id' => "region",
        'help' => "选择地区",
        'value' => "西北",
        'options' => [
            [
                'title' => "华中",
                'value' => "华中"
            ],
            [
                'title' => "华南",
                'value' => "华南"
            ],
            [
                'title' => "华北",
                'value' => "华北"
            ],
            [
                'title' => "东北",
                'value' => "东北"
            ],
            [
                'title' => "西北",
                'value' => "西北"
            ]
        ],
    ],
    [
        'type' => "file",
        'name' => "name",
        'label' => "hash文件",
        'help' => "选择文件",
    ],
];

$html = implode(" ", array_map(function($element) use($renderer){
    if(isset($element['options'])){
        $element['options'] = array_map(function($option) use($element){
            if($option['value'] == $element['value']){
                $option['selected'] = true;
            }
            return new \Kyanag\Form\Core\ArrayOption($option);
        }, $element['options']);
    }
    $_ = new \Kyanag\Form\Core\ArrayElement($element);
    return $renderer->render($element['type'], $_);
}, $elements));

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title></title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.1/css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <form>
        <?=$html?>
    </form>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.10.0/jquery.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.js"></script>
<script>
    $(function () {

    });
</script>
</body>
</html>


