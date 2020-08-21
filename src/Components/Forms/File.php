<?php


namespace Kyanag\Form\Components\Forms;

use Kyanag\Form\Component;

class File extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input {$this->renderClass()} {$this->withSelectorPrefix("file")}" name="{$this->showName()}" {$this->renderAttributes()}>
    <label class="custom-file-label">选择文件</label>
  </div>
</div>
TPL;
    }
}
