<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class Form extends Component
{

    use FormableTrait;

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
        return <<<TPL
{$this->renderFormHeader()}
    {$this->renderMethodField()}
    {$this->renderChildren()}
    {$this->renderActionButtons()}
{$this->renderFormFooter()}
TPL;
    }
}