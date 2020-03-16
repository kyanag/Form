## 基础表单组件库


### 说明

> 数据处理 和 render 分开， 可以自定义表单主题


```php
$bs3Theme = new \Kyanag\Form\Toolkits\Bootstrap3\Bootstrap3();
    $bs3Theme->setAction("");
    $bs3Theme->setEnctype("");
    $bs3Theme->setMethod("POST");

    $form =  new Kyanag\Form\Form($bs3Theme);

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Hidden("id"));
    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Text("title", "标题"));  //bootstrap3 控件
    $form->addComponent(new \Kyanag\Form\Toolkits\Bootstrap3\Select("category_id", "分类", [
            1 => "单机",
            2 => "网游",
            '类型' => [
                3 => 'FPS',
                4 => "RPG"
            ],
    ]));

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Checkbox("tags", "标签", [
        ['value' => 1, "title" => "端游"],
        ['value' => 2, "title" => "mmorpg"],
        ['value' => 3, "title" => "手游"]
    ]));

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Textarea("content", "富文本"));

    $form->addComponent(new \Kyanag\Form\Toolkits\Basic\Radio("status", "状态", [
        ['value' => 1, "title" => "可见"],
        ['value' => 0, "title" => "不可见"]
    ]));


    $form->setValue([
        'id' => 1,
        'title' => "号外号外",
        'category_id' => 1,
        'tags' => [1],
        'content' => "联盟日报",
        'status' => 0,
    ]);
    return $form;
```
