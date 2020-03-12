<?php


namespace Kyanag\Form\Interfaces;


use Kyanag\Form\Traits\ElementAttributesTrait;
use Kyanag\Form\Traits\FormBodyTrait;

abstract class AbstractFormBody implements FormBodyInterface
{

    const METHOD_GET = "GET";
    const METHOD_POST = "POST";
    const METHOD_DELETE = "DELETE";

    const ENCTYPE_DEFAULT = "application/x-www-form-urlencoded";
    const ENCTYPE_FORM = "multipart/form-data";
    const ENCTYPE_PLAIN = "text/plain";

    use ElementAttributesTrait;

    use FormBodyTrait;

    public function setMethod($method){
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
            $this->renderElements(),
            $this->renderEnd()
        ]);
    }

}