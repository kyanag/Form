<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 16:10
 */

namespace Kyanag\Form\Fields;


class Editor extends Field
{

    static $name = "Html文本";

    protected $_row = 3;

    /**
     * @param int $row
     */
    public function setRow($row)
    {
        $this->_row = $row;
        return $this;
    }

    public function getHeight(){
        return "500px";
    }

    public static function getClassName(){
        return "ims-editor";
    }

    /**
     * @return int
     */
    public function getRow()
    {
        return $this->_row;
    }

    public function render()
    {
        $errorClass = $this->getError() ? "has-error" : "";
        return <<<EOT
<div class="form-group row {$errorClass}">
    <label for="{$this->getId()}" class="col-sm-2 control-label">{$this->getLabel()}</label>
    <div class="col-sm-8">
        <script type="text/plain"
            id="{$this->getId()}"
            name="{$this->getName()}"
            class="form-control {$this::getClassName()} {$this->addedClasses()}"
            style="height: {$this->getHeight()};"
            data-id="{$this->getId()}"
            {$this->addedAttributes()}
        >{$this->getValue()}</script>
    </div>
</div>
EOT;
    }
}