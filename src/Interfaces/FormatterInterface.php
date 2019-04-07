<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 21:13
 */

namespace Kyanag\Form\Interfaces;


interface FormatterInterface extends Renderable
{

    public function __invoke($value, $record = [], $index = null);

}