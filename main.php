<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
require "./vendor/autoload.php";

$columns = getColumns();

/** @var \Kyanag\Form\Substances\Inspector $inspector */
$inspector = \Kyanag\Form\object_create(\Kyanag\Form\Substances\Inspector::class, [
    'columns' => $columns
]);

/** @var \Kyanag\Form\Widgets\Form $form */
$form = new \Kyanag\Form\Widgets\Form($inspector);
$form = \Kyanag\Form\object_init($form, [
    'action' => "",
    'method' => "post",
]);
if(strtoupper($_SERVER['REQUEST_METHOD']) == "GET"){

}else{
    var_dump($_POST);
    $form->fill($_POST);
}
?>
<html>
<head>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/4.2.1/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.css" rel="stylesheet">
    <link href="/examples/assets/wangEditor.fix.css" rel="stylesheet">
</head>
<body>
<div class="col-md-6">
    <?=$form->render()?>
</div>
<script src="https://cdn.bootcss.com/wangEditor/10.0.13/wangEditor.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="/examples/assets/Form.js"></script>
<script>
    var elements = document.getElementsByTagName("form");
    if(elements.length >= 1){
        let form = new Form(elements[0]);
        form.init();
    }
</script>
</body>
</html>


