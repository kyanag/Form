<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/7
 * Time: 00:43
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Interfaces\Analysable;

/**
 * @label 选择框
 */
class Choose implements Analysable
{

    public function __invoke($value, $record = [], $index = null)
    {
        return "<input type=\"checkbox\" class=\"form-check-input\" name='{$index}' value='{$value}'/>";
    }

}