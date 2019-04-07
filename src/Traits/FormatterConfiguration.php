<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 22:15
 */

namespace Kyanag\Form\Traits;
use Doctrine\Common\Annotations\AnnotationReader;
use Kyanag\Form\Annotations\Widget;
use Kyanag\Form\Fields\OnOff;
use Kyanag\Form\Interfaces\Renderable;
use function Kyanag\Form\object_create;

/**
 * 帮助创建配置化内容
 * @package Kyanag\Form\Traits
 */
trait FormatterConfiguration
{

    public function render(){
        /** @var AnnotationReader $reader */
        $reader = object_create([
            "@id" => AnnotationReader::class,
        ]);

        $class = get_class($this);
        /** @var array<ReflectionProperty> $properties */
        $properties = (new \ReflectionClass($class))->getProperties();

        $widgets = [];
        foreach ($properties as $property){
            $annotations = $reader->getPropertyAnnotations($property);
            foreach ($annotations as $annotation){
                if($annotation instanceof Renderable){
                    if(property_exists(get_class($annotation), "value")){
                        $annotation->value = $property->getValue($this);
                        $annotation->name = $property->name;
                    }
                    $widgets[] = $annotation;
                }
            }
        }
        return implode("", array_map(function($widget){
            return $widget->render();
        }, $widgets));
    }

}