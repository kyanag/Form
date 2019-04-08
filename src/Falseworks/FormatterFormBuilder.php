<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/8
 * Time: 10:56
 */

namespace Kyanag\Form\Falseworks;


use Kyanag\Form\Fields\MultiField;
use Kyanag\Form\Interfaces\Renderable;
use Doctrine\Common\Annotations\AnnotationReader;
use function Kyanag\Form\object_create;

class FormatterFormBuilder implements Renderable
{

    protected $formatters = [];


    /**
     * @param $label
     * @param $callable callable|string  class_name
     */
    public function register($callable, $label){
        $this->formatters[$label] = $callable;
    }

    public function render()
    {
        /** @var AnnotationReader $reader */
        $reader = object_create([
            "@id" => AnnotationReader::class,
        ]);

        /** @var MultiField $multiField */
        $multiField = object_create([
            "@id" => MultiField::class,
            'label' => "格式",
            'name' => "formatter",
            'help' => "字段格式",
        ]);

        foreach ($this->formatters as $label => $formatter){
            if(class_exists($formatter)){
                $class = new \ReflectionClass($formatter);
                $docLabel = $reader->getClassAnnotation($class, "label");
                $label = is_string($label) ? $label : $docLabel;
                /** @var array<ReflectionProperty> $properties */
                $properties = $class->getProperties();
            }
        }
    }

}