<?php

interface Renderable{
    /**
     * @return string
     */
    public function render();
}

abstract class Component{
    public $name;
    public $label;
    public $help;
    public $error;
    public $value;
    abstract public function toRenderable();
}

abstract class Form implements Renderable{
    /**
     * @var array<Renderable>
     */
    public $elements;
    abstract public function render();
}

abstract class ComponentCollection implements Renderable{
    /**
     * @var array<Component>
     */
    public $components = [];
}