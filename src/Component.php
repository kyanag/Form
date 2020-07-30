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
    public function __construct($name, $label, Attributes $attribute, $properties = [], Component $parentComponent = null)
    {
        $this->name = $name;
        $this->label = is_null($label) ? $name : $label;
        $this->attribute = $attribute;
        $this->properties = $properties;
        $this->parentComponent = $parentComponent;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        /**
*
         *
 * @var Component $child
*/
        foreach ($this->children as $child) {
            $childName = $child->getName();
            if (is_null($childName)) {
                $child->setValue($value);
            } else {
                $child->setValue($value[$childName]);
            }
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


    protected function showLabel()
    {
        return $this->label;
    }

    protected function showName()
    {
        return $this->name;
    }

    abstract public function render();
}
