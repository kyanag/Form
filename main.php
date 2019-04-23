<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

define("APP_PATH", __DIR__);

$columns = getColumns();

$container = new \League\Container\Container();

$container->add('form.image.upload_url', "/examples/upload.php");
$container->add('form.file.upload_url', "/examples/upload.php");
$container->add('form.file.domain', "");
$container->add('form.image.domain', "");

$app = new \Kyanag\Form\App($container);
$app->registerGlobal();

$text = new \Kyanag\Form\Fields\Text();
$fieldBuilder = new \Kyanag\Form\FieldBuilder($text);
$fieldBuilder->name("111")->label("111");
$fieldBuilder->ajax("http://www.baidu.com");

if($_POST){
    var_dump($_FILES);
    var_dump($_POST);exit();
}
/** @var \Kyanag\Form\Widgets\Form $form */
$form = new \Kyanag\Form\Widgets\Form();
foreach ($columns as $column){
    $form->pushPart(\Kyanag\Form\object_create($column));
}
$form->pushPart($fieldBuilder->toField());

$csrf = \Kyanag\Form\object_create([
    '@id' => \Kyanag\Form\Fields\Hidden::class,
    'name' => "_csrf",
    'value' => rand(10000, 888888)
]);

$form = \Kyanag\Form\object_init($form, [
    'action' => "",
    'enctype' => "multipart/form-data",
    'method' => "post",
]);

$form->value = ([
    'id' => 1,
    'title' => "号外号外",
    'category_id' => 2,
    'desc' => "燃烧军团入侵了!!",
    'tags' => [1, 2],
    'keywords' => [0, 1],
    'tpl' => "./content.html",
    'created_at' => "2019-03-28",
    'bg_img' => "examples/3be2be8f8c5494eef2bc8d2027f5e0fe99257e2d.jpg",
    'context' => "<h1>联盟日报</h1>",
    'status' => 1,
]);

?>
<html>
<head>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">
    <link href="https://libs.cdnjs.net/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.css" rel="stylesheet">
    <link href="/asserts/wangEditor.fix.css" rel="stylesheet">
    <link href="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/css/fileinput.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/explorer-fa/theme.css" />
    <link href="https://libs.cdnjs.net/select2/4.0.6-rc.1/css/select2.min.css" rel="stylesheet">
    <link href="/asserts/bootstrap4-select2.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" />
</head>
<body>
<div class="col-md-6">
    <?=$form->render()?>
</div>
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/js/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/js/locales/zh.js"></script>

<script src="https://libs.cdnjs.net/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.zh-CN.min.js"></script>

<script src="https://libs.cdnjs.net/select2/4.0.6-rc.1/js/select2.min.js"></script>
<script src="https://libs.cdnjs.net/select2/4.0.6-rc.1/js/i18n/zh-CN.js"></script>

<script src="/asserts/Form.js"></script>
<script>
    $("form").initForm();
</script>
</body>
</html>


