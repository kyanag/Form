<?php


namespace Kyanag\Form\Interfaces;


use Kyanag\Form\Traits\ElementAttributesTrait;
use Kyanag\Form\Traits\ElementTrait;

abstract class AbstractForm implements ElementInterface
{

    const METHOD_GET = "GET";
    const METHOD_POST = "POST";
    const METHOD_DELETE = "DELETE";

    const ENCTYPE_DEFAULT = "application/x-www-form-urlencoded";
    const ENCTYPE_FORMDATA = "multipart/form-data";
    const ENCTYPE_PLAIN = "text/plain";

    use ElementAttributesTrait;
    use ElementTrait;

    protected $overrideMethod;

    /**
     * @param $method
     * @param bool $override
     */
    public function setMethod($method, $override = false){
        if($override){
            $method = "POST";
            $this->overrideMethod = strtoupper($method);
        }
        $this->setAttribute("method", strtoupper($method));
    }

    public function setAction($action){
        $this->setAttribute("action", $action);
    }

    public function setEnctype($enctype){
        $this->setAttribute("enctype", $enctype);
    }

    protected function renderBegin(){
        return "<form {$this->renderAttributes()}>";
    }

    protected function renderOverrideMethod(){
        return $this->overrideMethod ? "<input type=\"hidden\" name=\"_method\" value=\"{$this->overrideMethod}\">" : "";
    }

    protected function renderElements(){
        return implode("\n", array_map(function($element){
            return $element->render();
        }, $this->elements));
    }

    protected function renderEnd(){
        return "</form>";
    }

    public function render()
    {
        return implode("\n", [
            $this->renderBegin(),
            $this->renderOverrideMethod(),
            $this->renderElements(),
            $this->renderEnd()
        ]);
    }

}