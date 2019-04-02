<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 21:12
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Interfaces\FormatterInterface;

class Same implements FormatterInterface
{

    public function __invoke($value, $record = [], $index = null, $field = null, $pk = "id")
    {
        return $value;
    }

}