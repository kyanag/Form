<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/7
 * Time: 11:29
 */

namespace Kyanag\Form\Interfaces;


interface Filter
{

    public function __invoke($query);

    public function render();

}