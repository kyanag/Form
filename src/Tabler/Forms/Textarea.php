<?php


namespace Kyanag\Form\Tabler\Forms;

use Kyanag\Form\Component;

class Textarea extends Component
{
    /**
     * 文本高度
     * @var int
     */
    public $row = 3;

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label" for="{$this->showId()}">{$this->showLabel()}</label>
  <textarea class="form-control {$this->renderClass()}" name="{$this->showName()}" rows="{$this->row}" {$this->renderAttributes()}>{$this->showValue()}</textarea>
</div>
TPL;
    }
}
