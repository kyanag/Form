<?php


namespace Kyanag\Form\Components\Decorators;


use Kyanag\Form\Component;
use Kyanag\Form\Supports\HtmlRenderer;

class ColumnDecorator extends Component
{

    /**
     * enum(
     *  ...range(1, 12)
     * )
     * @var int
     */
    public $colSize = 12;

    /**
     * enum(
     *  ""
     *  "sm",
     *  "md",
     *  "lg",
     *  "xl"
     * )
     * @var string
     */
    public $size = "md";

    public function render()
    {
        $innerHTML = HtmlRenderer::renderComponents($this->children);
        return <<<EOF
<div class="{$this->renderClass()} {$this->renderColClass()}">
    {$innerHTML}
</div>
EOF;

    }

    protected function renderColClass(){
        if($this->size === null){
            $this->size = "md";
        }
        $prefix = $this->size === "" ? "col" : "col-{$this->size}";

        if(is_null($this->colSize)){
            return $prefix;
        }else{
            return "{$prefix}-{$this->colSize}";
        }
    }
}