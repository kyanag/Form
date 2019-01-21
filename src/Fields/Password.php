<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:44
 */

namespace Kyanag\Form\Fields;

use Kyanag\Form\Field;

class Password extends Text
{

    public function getType()
    {
        return "password";
    }
}