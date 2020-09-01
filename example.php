<?php
if(strtolower($_SERVER['REQUEST_METHOD']) != "get"){
    var_dump($_REQUEST);exit();
}

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/18
 * Time: 14:07
 */
$loader = require "./vendor/autoload.php";

define("APP_PATH", __DIR__);

$tablerFactory = new \Kyanag\Form\Components\ElementFactory();

$files = glob(__DIR__ . "/src/Components/Forms/*.php");
foreach($files as $file){
    $classBaseName = basename($file, ".php");
    $snake_str = \Kyanag\Form\camelToSnake($classBaseName);
    $class = "Kyanag\\Form\\Components\\Forms\\{$classBaseName}";

    $tablerFactory->registerComponent($snake_str, $class);
}

$tablerFactory->registerComponent("card-form", \Kyanag\Form\Components\Form::class);
$tablerFactory->registerComponent("tabs", \Kyanag\Form\Components\Tabs::class);


$form = $tablerFactory->createElement("card-form", [
        'id' => "my-form",
    'method' => "post",
], [
//    $tablerFactory->createElement("text", [
//        'name' => "title",
//        'label' => "标题",
//        "error" => "error!",
//        'style' => "width:200px"
//    ]),
//    $tablerFactory->createElement("select", [
//        "name" => "category_id",
//        'label' => "分类",
//        "options" => [
//            1 => "单机",
//            2 => "网游",
//        ]
//    ]),
//    $tablerFactory->createElement("selectize", [
//        "name" => "brand_id",
//        'label' => "厂商",
//        "options" => [
//            1 => "网易",
//            2 => "腾讯",
//            3 => "搜狐"
//        ]
//    ]),
//
//    $tablerFactory->createElement("selectize", [
//        "name" => "send_to",
//        'label' => "抄送",
//        "options" => [
//            1 => ['value' => 1, "text" => "马雨"],
//            2 => ['value' => 2, "text" => "牛化腾"],
//            3 => ['value' => 3, "text" => "李彦紫"],
//            4 => ['value' => 4, "text" => "张背阳"],
//        ],
//        'placeholder' => "选择抄送人",
//        'multiple' => true,
//    ]),
//
//    $tablerFactory->createElement("checkbox", [
//        "name" => "tags",
//        'label' => "标签",
//        "options" => [
//            1 => ['value' => 1, "text" => "端游"],
//            2 => ['value' => 2, "text" => "mmorpg"],
//            3 => ['value' => 3, "text" => "手游"]
//        ]
//    ]),
//    $tablerFactory->createElement("file", [
//        "name" => "image",
//        'label' => "背景图",
//    ]),
//    $tablerFactory->createElement("ajax-file", [
//        "name" => "ajax-file",
//        'label' => "上传",
//        'dataset' => [
//            ''
//        ],
//    ]),
//    $tablerFactory->createElement("range", [
//        "name" => "hot_rank",
//        'label' => "热度",
//    ]),
//    $tablerFactory->createElement("radio", [
//        "name" => "status",
//        'label' => "状态",
//        'options' => [
//            "正常","隐藏"
//        ],
//    ]),
//    /** @var HasOne $hasOne */
    $tablerFactory->createElement("has-one",
        [
            'name' => "article",
            'label' => "",
        ],
        [
            $tablerFactory->createElement("ck-editor", [
                'name' => "content",
                'label' => "文章主体",
                'row' => 10,
                'style' => "min-height:500px"
            ]),
            $tablerFactory->createElement("datetime", [
                "id" => "datetime",
                'name' => "created_at",
                'label' => "创建时间",
                'dataset' => [
                     'format' => "datetime"
                ],
            ]),
        ]
    ),
    $tablerFactory->createElement("has-many",
        [
            'name' => "comments",
            'label' => "评论",
        ],
        [
            $tablerFactory->createElement("text", [
                'name' => "author",
                'label' => "评论者",
            ]),
            $tablerFactory->createElement("textarea", [
                'name' => "content",
                'label' => "评论内容",
                'row' => 2,
            ]),
        ]
    )
]);

$form->setValue([
    'title' => "联盟日报【号外】",
    'category_id' => 2,
    'brand_id' => [2,],
    'tags' => [2, 1],
    'send_to' => [1, 3, ],
    'ajax-file' => "http://www.baidu.com/葫芦娃.mp4",
    'status' => 1,
    'hot_rank' => 91,
    'article' => [
        'content' => "嘿，快醒醒，燃烧军团入侵了！",
        'created_at' => date("Y-m-d")
    ],
    'comments' => [
        [
            "author" => "特没谱",
            "content" => "没有人比我更懂PHP",
        ],
    ],
]);
//$str = $form->render();

$tabs = new \Kyanag\Form\Components\Tabs();

$tabs->addTab("主表单", $form, true);
$tabs->addTab("附属数据", new \Kyanag\Form\Components\Forms\StaticText());

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title></title>
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.1/css/bootstrap.css" rel="stylesheet">
    <link href="./dist/css/selectize-for-bootstrap4.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" />
    <meta charset="UTF-8">
    <link href="./build/main.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <?=$tabs->render()?>
        </div>
    </div>
</div>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/1.10.0/jquery.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/art-template/4.10.0/lib/template-web.js"></script>
<script src="./build/bundle.js"></script>
<script>
    $(function () {
        $.formerSetup({
            uploader:{
                url:"./examples/server.php"
            },
        });

        $("#my-form").former();
    });
</script>
</body>
</html>


