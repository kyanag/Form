<?php


namespace Kyanag\Form;


use Kyanag\Form\Core\Element;
use Kyanag\Form\Interfaces\Renderer;
use League\Plates\Engine;

class PlatesRenderer implements Renderer
{

    protected $template;

    protected $casts = [];

    public function __construct(Engine $engine, $casts = [])
    {
        $this->template = $engine;
        $this->casts = $casts;
    }

    public function setCast($type, $tpl){
        $this->casts[$type] = $tpl;
    }

    public function render($type, Element $element){
        $tpl = $type;
        if(isset($this->casts[$type])){
            $tpl = $this->casts[$type];
        }
        return $this->template->render($tpl, [
            'element' => $element
        ]);
    }
}