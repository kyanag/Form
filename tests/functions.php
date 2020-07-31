<?php
function test_path($path){
    return __DIR__  . DIRECTORY_SEPARATOR . $path;
}


function src_path($path){
    return realpath(__DIR__  . "/../src") . DIRECTORY_SEPARATOR . $path;
}