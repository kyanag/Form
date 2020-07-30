<?php


namespace Kyanag\Form\Tabler;

use Kyanag\Form\Attributes;
use Kyanag\Form\Supports\ComponentBuilder;
use Kyanag\Form\Tabler\Forms\Text;
use Kyanag\Form\Tabler\Forms\StaticText;
use Kyanag\Form\Tabler\Forms\Textarea;
use Kyanag\Form\Tabler\Forms\Select;
use Kyanag\Form\Tabler\Forms\Checkbox;
use Kyanag\Form\Tabler\Forms\Radio;

class TablerFactory
{

    protected $components = [];

    public function text($name, $label)
    {
        return new ComponentBuilder(new Text($name, $label, new Attributes()));
    }

    public function staticLabel($name, $label)
    {
        return new ComponentBuilder(new StaticText($name, $label, new Attributes()));
    }

    public function textarea($name, $label)
    {
        return new ComponentBuilder(new Textarea($name, $label, new Attributes()));
    }


    public function select($name, $label, $options = [])
    {
        return (new ComponentBuilder(new Select($name, $label, new Attributes())))->setOptions($options);
    }

    public function checkbox($name, $label, $options = [])
    {
        return (new ComponentBuilder(new Checkbox($name, $label, new Attributes())))->setOptions($options);
    }

    public function radio($name, $label, $options = [])
    {
        return (new ComponentBuilder(new Radio($name, $label, new Attributes())))->setOptions($options);
    }


    public function createElement($type, $props = [], $children = [])
    {
        if (isset($this->components[$type])) {
            $class = $this->components[$type];
            $name = @$props['name'] ?: null;
            $label = @$props['label'] ?: $name;
            $attribute = @$props['attribute'] ?: new Attributes();

            unset($props['name'], $props['label'], $props['attribute']);

            $componentBuilder = new ComponentBuilder(new $class($name, $label, $attribute));
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
