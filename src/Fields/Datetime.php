<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


class Datetime extends Text
{

    public $type = "date";

    public function getType(){
        return $this->type;
    }
}