<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;


use Kyanag\Form\Interfaces\Renderable;

class Button implements Renderable
{

    public function render()
    {

        $tpl = <<<EOF
<div class="form-group">
    <div class="col-md-10 col-md-offset-2">
        <button type="button" class="btn btn-primary">提交</button>
            
        <button type="reset" class="btn btn-warning">重置</button>
    </div>
</div>
EOF;
    return $tpl;
    }

}