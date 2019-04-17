<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17
 * Time: 11:30
 */

namespace Kyanag\Form\Fields;


use Kyanag\Form\Field;
use Kyanag\Form\Interfaces\Inspector;

class HasMany extends Field
{
    use \Kyanag\Form\Traits\MultiField;

    /**
     * @var Inspector
     */
    public $inspector;

    /**
     * @param Inspector $inspector
     */
    public function setInspector(Inspector $inspector)
    {
        $this->inspector = $inspector;
        $this->parts = [];
        foreach ($this->inspector->columns() as $column){
            $this->pushPart($column->toField());
        }
    }

    protected function renderInput()
    {
        // TODO: Implement renderInput() method.
    }
}