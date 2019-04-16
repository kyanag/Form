<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16
 * Time: 15:27
 */

namespace Kyanag\Form\Traits;

use Kyanag\Form\Field;

/**
 * Trait MultiValue
 * @package Kyanag\Form\Traits
 */
trait MultiValue
{

    public function getNameAttribute(){
        $name = parent::getNameAttribute();
        return $name . "[]";
    }

}