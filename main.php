<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

$columns = getColumns();

(new \Kyanag\Form\App(new \League\Container\Container()))->registerGlobal();

if($_POST){
    var_dump($_FILES);
    var_dump($_POST);exit();
}
/** @var \Kyanag\Form\Widgets\Form $form */
$form = new \Kyanag\Form\Widgets\Form();
foreach ($columns as $column){
    $form->pushPart(\Kyanag\Form\object_create($column));
}

$csrf = \Kyanag\Form\object_create([
        '@id' => \Kyanag\Form\Fields\Hidden::class,
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
    'keywords' => [0, 1],
    'tpl' => "./content.html",
    'created_at' => "2019-03-28",
    'bg_img' => "a.png",
    'context' => "<h1>联盟日报</h1>",
    'status' => 1,
];

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

    <link href="/asserts/bootstrap4-fileinput-icon.fix.css" rel="stylesheet">
</head>
<body>
<div>
    <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control ">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
</div>
<div class="col-md-6">
    <?=$form->render()?>
</div>
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/js/fileinput.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/js/locales/zh.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://libs.cdnjs.net/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.zh-CN.min.js"></script>

<script src="https://libs.cdnjs.net/select2/4.0.6-rc.1/js/select2.min.js"></script>
<script src="https://libs.cdnjs.net/select2/4.0.6-rc.1/js/i18n/zh-CN.js"></script>

<script src="/asserts/Form.js"></script>
<script>
    var elements = document.getElementsByTagName("form");
    if(elements.length >= 1){
        let form = new Form(elements[0]);
        form.init();
    }
    $(document).off('.datepicker.data-api');
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });
</script>
</body>
</html>


