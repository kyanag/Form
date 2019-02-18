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
    'action' => "/a.php",
    'method' => "post",
]);

var_dump($inspector->fields());