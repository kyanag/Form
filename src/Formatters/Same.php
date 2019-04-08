<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 21:12
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Interfaces\Analysable;
use Kyanag\Form\Interfaces\FormatterInterface;

/**
 * @label 原始内容
 */
class Same implements Analysable
{

    public function __invoke($value, $record = [], $index = null)
    {
        return $value;
    }

}