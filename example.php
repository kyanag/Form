<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

define("APP_PATH", __DIR__);

/**
 * @return \Kyanag\Form\Form
 */
function fromBasicBuilder(){

    $bs3Theme = new \Kyanag\Form\Toolkits\Bootstrap3\Bootstrap3();
    $bs3Theme->setAction("");
    $bs3Theme->setEnctype("");
    $bs3Theme->setMethod("POST");

    $form =  new Kyanag\Form\Form($bs3Theme);

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Hidden("id"));
    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Text("title", "标题"));
    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Select("category_id", "分类", [
            1 => "单机",
            2 => "网游",
            '类型' => [
                3 => 'FPS',
                4 => "RPG"
            ],
    ]));

    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Checkbox("tags", "标签", [
            1 => "端游",
        2 => "mmorpg",
        3 => "手游",
        4 => "3D"
    ]));

    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Textarea("content", "富文本"));

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Radio("status", "状态", [
        ['value' => 1, "title" => "可见"],
        ['value' => 0, "title" => "不可见"]
    ]));


    $form->setValue([
        'id' => 1,
        'title' => "号外号外",
        'category_id' => 1,
        'tags' => [1, 2, 4],
        'content' => "联盟日报",
        'status' => 0,
    ]);
    $form->setError([
            //'title' => "textTitleErrpr",
    ]);
    return $form;
}


$formBuilder = fromBasicBuilder();
?>
<html lang="zh">
<head>
    <title></title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <?=$formBuilder->toRenderable()->render()?>
    </div>
</div>
</body>
</html>


