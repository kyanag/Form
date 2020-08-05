<?php
require_once "Uploader.php";


$uploader = new Uploader([
    'saveDir' => realpath("../temp"),
    "tempDir" => realpath("../temp"),
]);

$uploader->upload();