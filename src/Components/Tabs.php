<?php


namespace Kyanag\Form\Components;


use Kyanag\Form\Component;
use function Kyanag\Form\randomString;
use Kyanag\Form\Renderable;

class Tabs extends Component
{

    public $titles = [];

    public $activeIndex = 0;

    public $tabIndexPrefix = null;

    public function render()
    {
        $tabIndexPrefix = $this->id;
        if($tabIndexPrefix === null){
            $tabIndexPrefix = randomString("tab-");
        }

        return <<<EOF
<div class="nav nav-tabs" role="tablist">
  {$this->renderTabItems($tabIndexPrefix)}
</div>
<div class="tab-content">
  {$this->renderTabPanels($tabIndexPrefix)}
</div>
EOF;
    }

    protected function renderTabItems($tabIndexPrefix){
        $html = "";
        foreach ($this->titles as $index => $title){
            $activeClass = $index === $this->activeIndex ? "active" : "";
            $html .= <<<EOF
<a class="nav-item nav-link {$activeClass}" href="#{$tabIndexPrefix}-{$index}" data-toggle="tab" role="tab">{$title}</a>
EOF;
;
        }
        return $html;
    }

    protected function renderTabPanels($tabIndexPrefix){
        return implode("", \Kyanag\Form\array_map($this->children, function($child, $index) use($tabIndexPrefix){
            $activeClass = $index === $this->activeIndex ? "active" : "";

             if(is_string($child)){
                 $childrenOuterHtml = $child;
             }else if($child instanceof Renderable){
                 $childrenOuterHtml = $child->render();
             }else{
                 $childrenOuterHtml = (string)$child;
             }
            return <<<EOF
<div class="tab-pane {$activeClass}" id="{$tabIndexPrefix}-{$index}" role="tabpanel">
  {$childrenOuterHtml}
</div>
EOF;
        }));
    }


    public function addTab($title, $item, $active = false){
        $this->titles[] = $title;
        $this->children[] = $item;

        if($active === true){
            $this->activeIndex = count($this->titles) - 1;
        }
    }

    public function addChild(Component $item, $strict = true)
    {
        throw new \BadMethodCallException("Tab 请使用 addTab 方法");
    }
}