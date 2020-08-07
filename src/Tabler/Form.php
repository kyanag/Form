<?php


namespace Kyanag\Form\Tabler;


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
     * @var bool
     */
    public $methodOverride = true;


    public $properties = [
        'title' => "编辑"
    ];

    public function render()
    {
        $childrenHtml = HtmlRenderer::renderComponents($this->children);
        return <<<TPL
<form action="{$this->action}" method="{$this->showMethod()}" enctype="{$this->enctype}" class="card" id="{$this->showId()}">
    {$this->renderHeader()}
    <div class="card-body">
        {$childrenHtml}
    </div>
    {$this->renderFooter()}
</form>
TPL;
    }


    protected function renderHeader(){
        return <<<EOF
<div class="card-header">
    <h3 class="card-title">{$this->properties['title']}</h3>
</div>
EOF;

    }

    protected function renderFooter(){
        return <<<EOF
<div class="card-footer text-right">
    <button type="submit" class="btn btn-primary">确认</button>
</div>
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