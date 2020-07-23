<?php


namespace Kyanag\Form\Tabler\Forms;


use Kyanag\Form\Component;

class File extends Component
{

    public function render()
    {
        return <<<TPL
<div class="form-group">
  <label class="form-label">{$this->showLabel()}</label>
  <div class="custom-file">
    <input type="file" class="custom-file-input" name="{$this->showName()}">
    <label class="custom-file-label">选择文件</label>
  </div>
</div>
TPL;
    }

}