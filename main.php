<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
require "./vendor/autoload.php";

$columns = getColumns();

if($_POST){
    var_dump($_FILES);
    var_dump($_POST);exit();
}
/** @var \Kyanag\Form $form */
$form = new \Kyanag\Form\Widgets\Form();
foreach ($columns as $column){
    $class = $column['fieldClass'];
    unset($column['fieldClass']);

    $form->field(\Kyanag\Form\object_create($class, $column));
}

$csrf = \Kyanag\Form\object_create(\Kyanag\Form\Fields\Hidden::class, [
    'name' => "_csrf",
    'value' => rand(10000, 888888)
]);

$form = \Kyanag\Form\object_init($form, [
    'action' => "",
    'method' => "post",
]);

$form->value = [
    'id' => 1,
    'title' => "号外号外",
    'category_id' => 2,
    'desc' => "燃烧军团入侵了!!",
    'tags' => [1, 2],
    'tpl' => "./content.html",
    'created_at' => "2019-03-28T12:30",
    'bg_img' => "a.jpg",
    'context' => "<h1>联盟日报</h1>",
    'status' => 1,
];

?>
<html>
<head>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.css" rel="stylesheet">
    <link href="/asserts/wangEditor.fix.css" rel="stylesheet">
    <link href="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/css/fileinput.css" rel="stylesheet">
</head>
<body>
<div class="col-md-6">
    <?=$form->render()?>
</div>
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/js/fileinput.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/js/locales/zh.js"></script>
<script src="/asserts/Form.js"></script>
<script>
    var elements = document.getElementsByTagName("form");
    if(elements.length >= 1){
        let form = new Form(elements[0]);
        form.init();
    }
</script>
</body>
</html>


