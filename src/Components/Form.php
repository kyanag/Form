<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class Form extends Component
{

    const HTTP_METHOD_GET = "get";
    const HTTP_METHOD_POST = "post";
    const HTTP_METHOD_PUT = "put";
    const HTTP_METHOD_DELETE = "delete";

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

    public function render()
    {
        $childrenHtml = HtmlRenderer::renderComponents($this->children);
        return <<<TPL
<form action="{$this->action}" method="{$this->showMethod()}" enctype="{$this->enctype}" class="{$this->renderClass()}" id="{$this->showId()}">
    {$this->renderMethodField()}
    {$childrenHtml}
    {$this->renderFooter()}
</form>
TPL;
    }

    protected function renderFooter(){
        return <<<EOF
<button type="submit" class="btn btn-primary">确认</button>
<button type="reset" class="btn btn-warning">重置</button>
EOF;
    }

    protected function renderMethodField(){
        if(!in_array(strtolower($this->method), ["get", "post"]) && @$this->properties['methodOverride'] === true){
            return "<input type='hidden' name='_method' value='{$this->method}'";
        }
        return "";
    }

    protected function showMethod(){
        if(!in_array(strtolower($this->method), ["get", "post"]) && @$this->properties['methodOverride'] === true){
            return "post";
        }else{
            return $this->method;
        }
    }
}