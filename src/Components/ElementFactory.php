<?php


namespace Kyanag\Form\Components;

use Kyanag\Form\Renderable;
use Kyanag\Form\Supports\ComponentBuilder;

class ElementFactory
{

    protected $components = [];

    /**
     * @param $type
     * @param array $props
     * @param array $children
     * @return Renderable|null
     */
    public function createElement($type, $props = [], $children = [])
    {
        if (isset($this->components[$type])) {
            $class = $this->components[$type];
            $componentBuilder = new ComponentBuilder(new $class);
            foreach ($props as $name => $propValue) {
                $componentBuilder->setProperty($name, $propValue);
            }
            $componentBuilder->setChildren($children);
            return $componentBuilder->built();
        }
        return null;
    }

    public function registerComponent($name, $class)
    {
        $this->components[$name] = $class;
    }
}