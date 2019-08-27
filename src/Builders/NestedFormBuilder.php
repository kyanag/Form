<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/23
 * Time: 23:28
 */

namespace Kyanag\Form\Builders;;

use Kyanag\Form\Fields\Datetime;
use Kyanag\Form\Fields\MultiField;
use Kyanag\Form\Fields\Checkbox;
use Kyanag\Form\Fields\Editor;
use Kyanag\Form\Fields\Hidden;
use Kyanag\Form\Fields\Number;
use Kyanag\Form\Fields\Radio;
use Kyanag\Form\Fields\Select;
use Kyanag\Form\Fields\Text;
use Kyanag\Form\Fields\Textarea;
use Kyanag\Form\Field;
use Psr\Container\ContainerInterface;

/**
 * Class NestedFormBuilder
 * @package Kyanag\Form\Builders
 *
 * @method FieldBuilder text($name, $label = null)
 * @method FieldBuilder radio($name, $label = null)
 * @method FieldBuilder select($name, $label = null)
 * @method FieldBuilder datetime($name, $label = null)
 * @method FieldBuilder editor($name, $label = null)
 * @method FieldBuilder textarea($name, $label = null)
 * @method FieldBuilder number($name, $label = null)
 */
class NestedFormBuilder extends FieldBuilder
{

    protected $container;

    /**
     * @var FieldBuilder[]
     */
    protected $builders = [];

    /**
     * NestedFormBuilder constructor.
     * @param MultiField $field
     *
     * must has 'hidden', 'checkbox', 'multi_field'
     * @param ContainerInterface $container
     */
    public function __construct(MultiField $field, ContainerInterface $container)
    {
        parent::__construct($field);

        $this->container = $container;
    }


    protected function resolve($name){
        if($this->container->has($name)){
            $field = $this->container->get($name);
            return $field;
        }
        return false;
    }

    public function __call($name, $arguments)
    {
        $field = $this->resolve($name);
        if($field !== false){
            $field_name = $arguments[0];
            $label = @$arguments[1] ?: $field_name;

            return $this->pushFieldBuilder($field)->name($field_name)->label($label);
        }else{
            parent::__call($name, $arguments);
        }
    }

    public function hidden($name){
        $field = $this->resolve("hidden");
        return $this->pushFieldBuilder($field)->name($name);
    }

    public function multiSelect($name, $label = null){
        return $this->select($name, $label)->multiple()->value([]);
    }

    public function checkbox($name, $label = null){
        $field = $this->resolve("checkbox");
        return $this->pushFieldBuilder($field)->name($name)->label($label)->multiple();
    }

    public function value($data){
        /** @var FieldBuilder $builder */
        foreach ($this->builders as $builder){
            $name = $builder->name;
            if(isset($data[$name])){
                $builder->value($data[$name]);
            }
        }
        return $this;
    }
    /**
     * @param $name
     * @param null $label
     * @param callable<static> $callback
     * @todo
     */
    public function hasMany($name, $label = null, callable $callback){
        //$form = new VirtualForm();
        //TODO
    }

    /**
     * @param $name
     * @param $label
     * @param callable<NestedFormBuilder> $callback
     */
    public function hasOne($name, $label, callable $callback){
        $multi_field = $this->resolve("multi_field");
        $formBuilder = new NestedFormBuilder($multi_field, $this->container);
        $this->builders[] = $formBuilder;
        call_user_func_array($callback, [$formBuilder]);
        return $formBuilder->name($name)->label($label);
    }

    protected function pushFieldBuilder(Field $field){
        $builder = new FieldBuilder($field);
        $this->builders[] = $builder;
        return $builder;
    }

    protected function nameWithNamespace($name){
        if($this->field->name){
            return implode(".", [
                $this->field->name,
                $name
            ]);
        }
        return $name;
    }

    public function toField()
    {
        /** @var MultiField $multiField */
        $multiField = parent::toField();
        foreach ($this->builders as $builder){
            $newName = $this->nameWithNamespace($builder->name);
            if($newName){
                $builder->name($newName);
            }
            $multiField->pushPart($builder->toField());
        }
        return $multiField;
    }

}