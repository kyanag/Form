<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 11:55
 */

namespace Kyanag\Form\Substances;


use function Kyanag\Form\object_create;
use Kyanag\Form\Traits\Configurable;

class Inspector implements \Kyanag\Form\Interfaces\Inspector
{

    use Configurable;

    protected $columns = [];

    protected $fields = null;

    public function primaryKey()
    {
        return "id";
    }

    public function comment()
    {
        return "文章";
    }

    public function fields()
    {
        if(is_null($this->fields)){
            $this->fields = array_map(function($column){
                return $column->toField();
            }, $this->columns);
        }
        return $this->fields;
    }

    public function setColumns($columns){
        $cols = [];
        foreach($columns as $column){
            $cols[] = object_create(Column::class, $column);
        }
        $this->columns = $cols;
    }

    public function columns()
    {
        return $this->columns();
    }
}