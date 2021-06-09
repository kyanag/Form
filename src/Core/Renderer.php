<?php


namespace Kyanag\Form\Core;

use Kyanag\Form\Interfaces\Element;
use Kyanag\Form\Interfaces\Renderer as IRenderer;
use League\Plates\Engine;

class Renderer implements IRenderer
{

    protected $engine;

    protected $casts = [];

    public function __construct(Engine $engine, $casts = [])
    {
        $this->engine = $engine;
        $this->casts = $casts;
    }

    public function getEngine()
    {
        return $this->engine;
    }

    public function setCast($type, $tpl)
    {
        $this->casts[$type] = $tpl;
    }

    public function render(Element $element)
    {
        $type = $element->type;
        $tpl = $type;
        if (isset($this->casts[$type])) {
            $tpl = $this->casts[$type];
        }
        return $this->engine->render($tpl, [
            'element' => $element
        ]);
    }
}
