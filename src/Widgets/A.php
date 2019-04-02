<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/2
 * Time: 22:51
 */

namespace Kyanag\Form\Widgets;


use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\WidgetAttribute;

/**
 * @Annotation
 * @package Kyanag\Form\Widgets
 */
class A implements Renderable
{

    use WidgetAttribute;

    public $class = [];

    /**
     * @var string
     */
    public $href;

    /**
     * @var string
     */
    public $innerHtml;

    public function render()
    {
        $attributes = [
            'href' => $this->href,
            'class' => is_array($this->class) ? implode(" ", $this->class) : $this->class,
        ];
        return "<a {$this->renderAttributes($attributes)}>{$this->innerHtml}</a>";
    }

}