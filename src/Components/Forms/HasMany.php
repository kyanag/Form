<?php


namespace Kyanag\Form\Components\Forms;


use Kyanag\Form\Component;
use function Kyanag\Form\data_get;
use function Kyanag\Form\randomString;

/**
 * TODO
 * Class HasMany
 * @package Kyanag\Form\Components\Forms
 */
class HasMany extends Component
{


    public function render()
    {
        if(is_null($this->id)){
            $this->id = randomString();
        }

        return <<<TPL
<fieldset class="has-many" data-tpl-target="#has-many-{$this->showId()}">
    <legend class="border-bottom">{$this->showLabel()}</legend>
    {$this->renderChildren()}
</fieldset>
<script type="text/template" id="has-many-{$this->showId()}">
    
</script>
TPL;
    }

    protected function renderChildren(){
        $value = data_get((array)$this->value, $this->name);
        foreach ($value as $index => $_){

        }
    }

    protected function renderTemplate(){

    }
}