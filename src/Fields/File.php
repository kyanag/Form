<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 18:21
 */

namespace Kyanag\Form\Fields;


class File extends Text
{

    static $name = "文件";

    public static function getBtnClassName(){
        return "ims-upload-btn";
    }

    public function render()
    {
        $field = $this;
        $errorClass = $this->getError() ? "has-error" : "";
        return <<<EOT

EOT;

    }
}