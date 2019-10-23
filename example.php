<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

define("APP_PATH", __DIR__);

$container = new \League\Container\Container();

foreach (\Kyanag\Form\fieldMappings() as $name => $class){
    $container->add($name, $class);
}

function fromBuilder(){
    global  $container;

    $formBuilder = new \Kyanag\Form\Builders\FormBuilder(new \Kyanag\Form\Widgets\Form(), $container);
    $formBuilder->method("get");

    $formBuilder->hidden("id");
    $formBuilder->text("title", "标题")->help("111")->error("长度不够");
    $formBuilder->select("category_id", "分类")->options([
        ['value' => 1, "name" => "单机"],
        ['value' => 2, "name" => "网游"]
    ]);

    $formBuilder->checkbox("tags", "标签")->options([
        ['value' => 1, "name" => "端游"],
        ['value' => 2, "name" => "mmorpg"]
    ]);

    $formBuilder->datetime("created_at", "发布日期");

    $formBuilder->ajax_image("bg_img", "图片")->help("111");

    $formBuilder->hasOne("member", "测试hasOne", function(\Kyanag\Form\Builders\NestedFormBuilder $form){
        //去掉HasOne 的 label 部分
        $form->disableLabel();

        $form->text("name", "名称")->required();
        $form->text("mobile", "电话号")->required();
    });

    $formBuilder->editor("context", "内容");

    $formBuilder->value([
        'id' => 1,
        'title' => "号外号外",
        'category_id' => 2,
        'desc' => "燃烧军团入侵了!!",
        'tags' => [1, 2],
        'created_at' => "2019-03-28",
        'bg_img' => "asserts/p.png",
        'context' => "<h1>联盟日报</h1>",
        'member' => [
            'name' => "张三",
            "mobile" => "337845818"
        ],
        'status' => 1,
    ]);
    $form = $formBuilder->toField();
    return $form;
}


$formBuilder = fromBuilder();
?>
<html>
<head>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">
    <link href="https://libs.cdnjs.net/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.css" rel="stylesheet">
    <link href="https://libs.cdnjs.net/bootstrap-fileinput/5.0.1/css/fileinput.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/explorer-fa/theme.css" />
    <link href="https://libs.cdnjs.net/select2/4.0.6-rc.1/css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.css" />
    <link href="/asserts/wangEditor.fix.css" rel="stylesheet">
    <link href="/asserts/form.css" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-md-6">
        <?=$formBuilder->render()?>
    </div>
</div>
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="https://cdn.bootcss.com/webuploader/0.1.1/webuploader.min.js"></script>

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


