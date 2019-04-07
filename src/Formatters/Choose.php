<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/7
 * Time: 00:43
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Fields\Checkbox;
use Kyanag\Form\Interfaces\FormatterInterface;
use function Kyanag\Form\object_create;

class Choose implements FormatterInterface
{

    public function __invoke($value, $record = [], $index = null)
    {
        return "<input type=\"checkbox\" class=\"form-check-input\" name='{$index}' value='{$value}'/>";
    }

    public function render()
    {
        return null;
    }

}