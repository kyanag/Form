<?php


namespace Kyanag\Form\Supports;

use Kyanag\Form\Renderable;

class HtmlRenderer
{

    public static function renderAttributes($attributes)
    {
        $_ = [];
        foreach ($attributes as $name => $value) {
            if ($__ = static::renderAttribute($name, $value)) {
                $_[] = $__;
            }
        }
        return implode(" ", $_);
    }

    protected static function renderAttribute($name, $value)
    {
        if ($name == "data") {
            $value = (array)$value;
            return static::renderDataset($value);
        } else {
            if (is_bool($value)) {
                return $value ? "{$name}={$name}" : "";
            }
            if (is_array($value)) {
                $value = implode(" ", $value);
            }
            return "{$name}=\"{$value}\"";
        }
    }

    public static function renderDataset($datas)
    {
        $datas = array_filter($datas);
        return implode(
            " ",
            \Kyanag\Form\array_map(
                $datas,
                function ($data, $name) {
                    if (is_array($data)) {
                        $data = json_encode($data);
                    }
                    return "data-{$name}='{$data}'";
                }
            )
        );
    }

    /**
     * @param array<Renderable|string> $components
     */
    public static function renderComponents($components)
    {
        return implode(
            " ",
            \Kyanag\Form\array_map(
                $components,
                function ($component, $index) {
                    return static::renderComponent($component);
                }
            )
        );
    }

    public static function renderComponent($component){
        if(method_exists($component, "render")){
            return $component->render();
        }
        if(is_object($component) && method_exists($component, "__toString")  or is_string($component)){
            return (string)$component;
        }
        //warning 可以抛出异常
        return (string)$component;
    }
}
