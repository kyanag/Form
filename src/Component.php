<?php


namespace Kyanag\Form;

abstract class Component implements Renderable
{

    use BaseComponentTrait;

    /**
     * Component constructor.
     *
     * @param string         $name            组件值名称
     * @param string         $label           组件标题
     * @param Attributes     $attribute       通用属性
     * @param array          $properties      扩展属性
     * @param Component|null $parentComponent 父组件
     */
    public function __construct($name, $label, Attributes $attribute, Component $parentComponent = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->attribute = $attribute;
        $this->parentComponent = $parentComponent;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        /** @var Component $child */
        foreach ($this->children as $child) {
            $child->setValue($value);
        }
    }

    public function getName()
    {
        return $this->name;
    }


    public function getAttributes()
    {
        return $this->attribute;
    }

    public function getAttribute($name)
    {
        return $this->attribute->{$name};
    }

    public function setAttribute($name, $value)
    {
        $this->attribute->{$name} = $value;
    }

    public function getChild($id)
    {
        return array_first(
            $this->children,
            function ($item, $index) use ($id) {
                return $item->id == $id;
            }
        );
    }

    public function addChild(Component $item)
    {
        $this->children[] = $item;
    }

    abstract public function render();
}
