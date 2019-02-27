<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 10:23
 */

namespace Kyanag\Form\Widgets;

use Kyanag\Form\Widgets\BaseElement;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\object_create;

class Raw implements Renderable
{

    public $raw;

    public function render()
    {
        return $this->raw;
    }
}