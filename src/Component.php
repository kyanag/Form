<?php


namespace Kyanag\Form;

use Kyanag\Form\Supports\HtmlRenderer;

abstract class Component implements Renderable
{

    use BaseComponentTrait;

    /**
     * 元素id/class的前缀
     * @var string
     */
    public $namespace = "oneform-";

    /**
     * Component constructor.
     *
     * @param string         $name            组件值名称
     * @param string         $label           组件标题
     * @param Component|null $parentComponent 父组件
     */
    public function __construct($name, $label)
    {
        $this->name = $name;
        $this->label = $label;
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
            $lastKeyPos = strrpos($child->getName(), ".");
            $lastKeyPos = ($lastKeyPos === false) ? -1 : $lastKeyPos;
            $indexKey = substr($child->getName(), $lastKeyPos + 1);

            $child->setValue(data_get($value, $indexKey));
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getChildren($id)
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
        $item->parentComponent = $this;
        $this->children[] = $item;
    }


    protected function renderAttributes(){
        $attributes = [
            'id' => $this->showId(),
            'style' => $this->style,
            'placeholder' => $this->placeholder,
            'multiple' => $this->multiple,
            'disable' => $this->disable,
            'readonly' => $this->readonly,
            'data' => $this->dataset
        ];

        $attributes = array_filter($attributes, function($value){
            return $value !== null;
        });
        return HtmlRenderer::renderAttributes($attributes);
    }


    protected function renderClass(){
        return implode(" ", (array)$this->class);
    }

    abstract public function render();


    /**
     * @param string $name
     * @return string
     */
    protected function withNamespace($name){
        return "{$this->namespace}{$name}";
    }
}
