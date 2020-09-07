<?php


namespace Kyanag\Form\Components;

use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

/**
 * Trait FormableTrait
 * @package Kyanag\Form\Components
 * @mixin Component
 */
trait FormableTrait
{

    /**
     * @var string
     */
    public $action;

    /**
     * @var string enum(GET|POST|PUT|DELETE)
     */
    public $method = "GET";

    /**
     * @var string
     */
    public $enctype;

    /**
     * HTTP method 伪造
     * @var bool
     */
    public $methodOverride = true;


    protected function renderMethodField(){
        if(!in_array(strtolower($this->method), ["get", "post"]) && $this->methodOverride === true){
            return "<input type='hidden' name='_method' value='{$this->method}'";
        }
        return "";
    }

    protected function renderFormHeader(){
        $attrs = [
            'action' => $this->action,
            'method' => $this->showMethod(),
            'enctype' => $this->enctype,
            'class' => $this->renderClass(),
            'id' => $this->showId(),
        ];
        $a = HtmlRenderer::renderAttributes($attrs);
        return <<<EOF
<form {$a}>
EOF;

    }

    protected function renderFormFooter(){
        return "</form>";
    }

    protected function showMethod(){
        if(!in_array(strtolower($this->method), ["get", "post"]) && $this->methodOverride === true){
            return "post";
        }else{
            return $this->method;
        }
    }


    protected function renderActionButtons(){
        return <<<EOF
<div class="card-footer text-muted">
<button type="submit" class="btn btn-primary">确认</button>
<button type="reset" class="btn btn-warning">重置</button>
</div>
EOF;
    }
}