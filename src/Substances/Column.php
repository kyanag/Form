<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 11:55
 */

namespace Kyanag\Form\Substances;


use Kyanag\Form\FieldManager;

class Column extends \Kyanag\Form\Interfaces\Column
{

    public function toField(){
        $class = $this->fieldClass;
        return FieldManager::create($class, [
            'label' => $this->label,
            'name' => $this->name,
            'options' => $this->options,
            'help' => $this->help
        ]);
    }
}