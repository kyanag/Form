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
 * @return \Kyanag\Form\ActiveForm
 */
function formBuilder(){

    $bs3Theme = new \Kyanag\Form\Toolkits\Bootstrap3\Bootstrap3();
    $bs3Theme->setAction("");
    $bs3Theme->setEnctype("");
    $bs3Theme->setMethod("POST");

    $fieldset = new \Kyanag\Form\Toolkits\Bootstrap3\Fieldset(new \Kyanag\Form\Supports\ComponentCollectionProvider(), "hasOne", "单关联");
    $fieldset->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Text("title", "子标题"));

    $form =  new Kyanag\Form\ActiveForm(new \Kyanag\Form\Supports\ComponentCollectionProvider(), $bs3Theme);

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Hidden("id"));
    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\StaticLabel("title", "标题"));
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

    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Radio("status", "状态", [
            1 => "可见",
        0 => "不可见"
    ]));

    $form->addComponent($fieldset);

    $form->addRenderable(new \Kyanag\Form\Toolkits\Bootstrap3\Button());


    $form->setValue([
        'id' => 1,
        'title' => "号外号外!燃烧军团入侵啦！",
        'category_id' => 1,
        'tags' => [1, 2, 4],
        'content' => "联盟日报",
        'status' => 0,
        'hasOne' => [
                'title' => "附加数据"
        ],
    ]);
    $form->setError([
            'hasOne' => [
                    'title' => "111"
            ],
    ]);
    return $form;
}


$formBuilder = formBuilder();
?>
<html lang="zh">
<head>
    <title></title>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style></style>
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <?=$formBuilder->render()?>
    </div>
</div>
</body>
</html>


