<?php


namespace Kyanag\Form\Components\Forms;


use Kyanag\Form\Component;
use Kyanag\Form\Components\FormSection;
use function Kyanag\Form\randomString;
use Kyanag\Form\Supports\ComponentBuilder;

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
<fieldset class="{$this->renderClass()} {$this->withSelectorPrefix("hasmany")}" id="{$this->showId()}" data-tpl-target="#has-many-{$this->showId()}">
    <legend>{$this->showLabel()}</legend>
    <div class="ml-4 {$this->withSelectorPrefix("hasmany-formzone")}">
        {$this->renderChildren()}
    </div>
    <div class="row py-2 ml-4">
        <div class="col-md-10"></div>
        <div class="col-md-2">
            <a class="btn btn-outline-primary btn-sm align-middle {$this->withSelectorPrefix("hasmany-add")}">添加</a>
        </div>
    </div>
</fieldset>
<script type="text/template" id="has-many-{$this->showId()}">
    {$this->renderTpl()}
</script>
TPL;
    }

    protected function renderChildren(){
        $formSection = $this->buildFormSection();

        $formBuilder = new ComponentBuilder($formSection);

        return implode("", \Kyanag\Form\array_map($this->value, function($value, $index) use($formSection, $formBuilder){
            $formBuilder->setName("{$this->getName(true)}.{$index}", true);
            $formSection->setValue($value);

            return <<<EOF
<div class="row border-bottom pt-3 {$this->withSelectorPrefix("hasmany-itemzone")}">
    <div class="col-md-10">{$formSection->render()}</div>
    <div class="col-md-2">
        <a class="btn btn-danger btn-sm align-middle {$this->withSelectorPrefix("hasmany-item-delete")}">删除</a>
    </div>
</div>
EOF;
        }));
    }

    protected function renderTpl(){
        $formSection = $this->buildFormSection();

        $formBuilder = new ComponentBuilder($formSection);
        $formBuilder->setName("{$this->getName(true)}.?", true);

        return <<<EOF
<div class="row border-bottom pt-3 {$this->withSelectorPrefix("hasmany-itemzone")}">
    <div class="col-md-10">{$formSection->render()}</div>
    <div class="col-md-2">
        <a class="btn btn-danger btn-sm align-middle {$this->withSelectorPrefix("hasmany-item-delete")}">删除</a>
    </div>
</div>
EOF;
    }

    protected function buildFormSection(){
        $formSection = new FormSection();

        $children = $this->children;
        foreach ($children as $child){
            $child = clone $child;
            $formSection->addChild($child, true);
        }
        return $formSection;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    protected function renderTemplate(){

    }
}