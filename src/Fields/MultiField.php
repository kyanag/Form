<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/23
 * Time: 15:10
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;
use Kyanag\Form\Interfaces\Renderable;

class MultiField extends Field
{

    protected $parts = [];

    public function pushPart(Renderable $part){
        $this->parts[] = $part;
    }

    protected function renderInput()
    {
        return implode("", array_map(function(Renderable $field){
            return $this->renderPart($field);
        }, $this->parts));
    }

    protected function renderPart(Renderable $part){
        return $part->render();
    }

}