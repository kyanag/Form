<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/13
 * Time: 9:58
 */

namespace Kyanag\Form\Fields;


class Hidden extends Text
{

    public $_template = "{input}";

    public function getType()
    {
        return "hidden";
    }
}