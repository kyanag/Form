<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/15
 * Time: 11:55
 */

namespace Kyanag\Form\Interfaces;


use Kyanag\Form\Field;
use Kyanag\Form\Traits\Configurable;

/**
 * Class Column
 * @package Kyanag\Form\Column
 * @property string $label
 * @property string $name
 * @property string $help
 */
abstract class Column
{

    use Configurable;

    protected $inspector;

    protected $fieldClass;

    protected $label;

    protected $name;

    protected $help;

    protected $error;

    protected $value;

    public function getFieldClass()
    {
        return $this->fieldClass;
    }

    public function setFieldClass($fieldClass){
        $this->fieldClass = $fieldClass;
    }

    public function isActive($scene)
    {
        return true;
    }

    /**
     * @return Field
     */
    abstract function toField();
}