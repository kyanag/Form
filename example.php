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
 * @return \Kyanag\Form\FormBuilder
 */
function fromBasicBuilder(){

    $formBody = new \Kyanag\Form\Toolkits\Basic\Form();
    $formBody->setMethod("get");

    $formBuilder = new \Kyanag\Form\FormBuilder($formBody);

    $formBuilder->addComponent(new \Kyanag\Form\Toolkits\Basic\Hidden("id"));
    $formBuilder->addComponent(new \Kyanag\Form\Toolkits\Basic\Text("title", "标题"));
    $formBuilder->addComponent(new \Kyanag\Form\Toolkits\Basic\Select("category_id", "分类", [
        ['value' => 1, "title" => "单机"],
        ['value' => 2, "title" => "网游"]
    ]));

    $formBuilder->addComponent(new \Kyanag\Form\Toolkits\Basic\Checkbox("tags", "标签", [
        ['value' => 1, "title" => "端游"],
        ['value' => 2, "title" => "mmorpg"],
        ['value' => 3, "title" => "手游"]
    ]));

    $formBuilder->addComponent(new \Kyanag\Form\Toolkits\Basic\Textarea("content", "富文本"));

    $formBuilder->addComponent(new \Kyanag\Form\Toolkits\Basic\Radio("status", "状态", [
        ['value' => 1, "title" => "可见"],
        ['value' => 2, "title" => "不可见"]
    ]));


    $formBuilder->setValue([
        'id' => 1,
        'title' => "号外号外",
        'category_id' => 2,
        'tags' => [1, 2],
        'content' => "联盟日报",
        'status' => 1,
    ]);
    return $formBuilder;
}


$formBuilder = fromBasicBuilder();
?>
<html lang="zh">
<head>
    <title></title>
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <?=$formBuilder->render()?>
    </div>
</div>
</body>
</html>


