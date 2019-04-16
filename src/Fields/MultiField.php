<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/6
 * Time: 00:15
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;
use Kyanag\Form\Interfaces\Renderable;

class MultiField extends Field
{

    protected $fields = [];

    public function addField(Field $field){
        $this->fields[] = $field;
    }

    protected function renderInput()
    {
        return implode("", array_map(function(Renderable $field){
            return $field->render();
        }, $this->fields));
    }

}