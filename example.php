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
$components = [
        $tablerFactory->text("title", "标题"),

    $tablerFactory->select("category_id", "分类", [
        1 => "单机",
        2 => "网游"
    ]),
    $tablerFactory->checkbox("tags", "标签", [
        1 => ['value' => 1, "text" => "端游"],
        2 => ['value' => 2, "text" => "mmorpg"],
        3 => ['value' => 3, "text" => "手游"]
    ]),
    $tablerFactory->textarea("content", "富文本"),
    $tablerFactory->radio("status", "状态", [
        1 => ['value' => 1, "text" => "可见"],
        0 => ['value' => 0, "text" => "不可见"]
    ])
];

$str = implode("\n", array_map(function($component){
    return $component->built()->render();
}, $components));

?>
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Input mask</h3>
            </div>
            <div class="card-body">
                <?=$str?>
                <div class="form-footer">
                    <button class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


