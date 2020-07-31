<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

define("APP_PATH", __DIR__);

$tablerFactory = new \Kyanag\Form\Tabler\TablerFactory();

$files = glob(__DIR__ . "/src/Tabler/Forms/*.php");
foreach($files as $file){
    $classBaseName = basename($file, ".php");
    $snake_str = \Kyanag\Form\camelToSnake($classBaseName);
    $class = "Kyanag\\Form\\Tabler\\Forms\\{$classBaseName}";

    $tablerFactory->registerComponent($snake_str, $class);
}

$tablerFactory->registerComponent("form", \Kyanag\Form\Tabler\Form::class);


$form = $tablerFactory->createElement("form", [], [
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
            'label' => null,
        ],
        [
            $tablerFactory->createElement("textarea", [
                'name' => "article.content",
                'label' => "文章主体",
            ]),
            $tablerFactory->createElement("text", [
                'name' => "article.created_at",
                'label' => "创建时间",
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

use Kyanag\Form\Tabler\Forms\HasOne;use Kyanag\Form\Tabler\TablerFactory;?>
<html lang="zh">
<head>
    <title></title>
    <link href="https://preview.tabler.io/assets/css/dashboard.css" rel="stylesheet">
    <meta charset="UTF-8">
    <style></style>
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <?=$str?>
    </div>
</div>
</body>
</html>


