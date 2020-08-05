<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

define("APP_PATH", __DIR__);

$tablerFactory = new \Kyanag\Form\Tabler\ElementFactory();

$files = glob(__DIR__ . "/src/Tabler/Forms/*.php");
foreach($files as $file){
    $classBaseName = basename($file, ".php");
    $snake_str = \Kyanag\Form\camelToSnake($classBaseName);
    $class = "Kyanag\\Form\\Tabler\\Forms\\{$classBaseName}";

    $tablerFactory->registerComponent($snake_str, $class);
}

$tablerFactory->registerComponent("form", \Kyanag\Form\Tabler\Form::class);


$form = $tablerFactory->createElement("form", [
        'id' => "my-form"
], [
    $tablerFactory->createElement("text", [
        'name' => "title",
        'label' => "标题",
    ]),
    $tablerFactory->createElement("select", [
        "name" => "category_id",
        'label' => "分类",
        "options" => [
            1 => "单机",
            2 => "网游"
        ]]),
    $tablerFactory->createElement("checkbox", [
        "name" => "tags",
        'label' => "标签",
        "options" => [
            1 => ['value' => 1, "text" => "端游"],
            2 => ['value' => 2, "text" => "mmorpg"],
            3 => ['value' => 3, "text" => "手游"]
        ]
    ]),
    $tablerFactory->createElement("file", [
        "name" => "image",
        'label' => "背景图",
    ]),
    $tablerFactory->createElement("ajax-file", [
        "name" => "ajax-image",
        'label' => "上传",
    ]),
    $tablerFactory->createElement("range", [
        "name" => "hot_rank",
        'label' => "热度",
    ]),
    $tablerFactory->createElement("radio", [
        "name" => "status",
        'label' => "状态",
        'options' => [
            "正常","隐藏"
        ],
    ]),
    /** @var HasOne $hasOne */
    $tablerFactory->createElement("has-one",
        [
            'name' => "article",
            'label' => "",
        ],
        [
            $tablerFactory->createElement("textarea", [
                'name' => "article.content",
                'label' => "文章主体",
            ]),
            $tablerFactory->createElement("datetime", [
                "id" => "datetime",
                'name' => "article.created_at",
                'label' => "创建时间",
                'dataset' => [
                        'format' => "yyyy-mm-dd"
                ],
            ]),
        ]
    )
]);

$form->setValue([
    'title' => "联盟日报【号外】",
    'category_id' => 2,
    'tags' => [2],
    'status' => 1,
    'article' => [
        'content' => "嘿，快醒醒，燃烧军团入侵了！",
        'created_at' => date("Y-m-d H:i:s")
    ],
]);

$str = $form->render();

use Kyanag\Form\Tabler\Forms\HasOne;use Kyanag\Form\Tabler\ElementFactory;?>
<html lang="zh">
<head>
    <title></title>
    <link href="https://preview.tabler.io/assets/css/dashboard.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/gijgo/1.9.13/combined/css/gijgo.css" rel="stylesheet">
    <meta charset="UTF-8">
    <style></style>
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <?=$str?>
    </div>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/gijgo/1.9.13/combined/js/gijgo.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/gijgo/1.9.13/combined/js/messages/messages.zh-cn.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/webuploader/0.1.1/webuploader.js"></script>
<script src="./dist/js/tabler-form.js"></script>
<script>
    $(function () {
        $.tablerFormSetup({
            uploader:{
                url:"./examples/server.php"
            }
        });

        $("#my-form").tablerForm();
    })
</script>
</body>
</html>


