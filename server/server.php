<?php
require_once "Uploader.php";


$uploader = new Uploader([
    'saveDir' => realpath("../build"),
    "tempDir" => realpath("../build"),
]);

$newfile = $uploader->upload();

$documentRoot = str_replace("\\", "/", realpath("../"));

$newfile = str_replace("\\", "/", $newfile);

$url = str_replace($documentRoot, "", $newfile);

echo json_encode([
    'url' => $url,
]);
exit();