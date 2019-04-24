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
use Kyanag\Form\Fields\Radio;
use Kyanag\Form\Fields\Select;
use Kyanag\Form\Fields\Text;
use Kyanag\Form\Fields\Textarea;
use Kyanag\Form\Field;

class NestedFormBuilder extends FieldBuilder
{
    /**
     * @var FieldBuilder[]
     */
    protected $builders = [];

    public function __construct(MultiField $field)
    {
        parent::__construct($field);
    }

    public function text($name, $label = null){
        return $this->pushFieldBuilder(new Text())->name($name)->label($label);
    }

    public function hidden($name){
        return $this->pushFieldBuilder(new Hidden())->name($name);
    }

    public function radio($name, $label = null){
        return $this->pushFieldBuilder(new Radio())->name($name)->label($label);
    }

    public function select($name, $label = null){
        return $this->pushFieldBuilder(new Select())->name($name)->label($label);
    }

    public function multiSelect($name, $label = null){
        return $this->select($name, $label)->multiple()->value([]);
    }

    public function checkbox($name, $label = null){
        return $this->pushFieldBuilder(new Checkbox())->name($name)->label($label)->multiple();
    }

    public function datetime($name, $label = null){
        return $this->pushFieldBuilder(new Datetime())->name($name)->label($label);
    }

    public function textarea($name, $label){
        return $this->pushFieldBuilder(new Textarea())->name($name)->label($label);
    }

    public function editor($name, $label){
        return $this->pushFieldBuilder(new Editor())->name($name)->label($label);
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
     * @param callable<ActiveForm> $callback
     */
    public function hasMany($name, $label = null, callable $callback){
        //$form = new VirtualForm();

    }

    /**
     * @param $name
     * @param $label
     * @param callable(ActiveForm) $callback
     */
    public function hasOne($name, $label, callable $callback){
        $formBuilder = new NestedFormBuilder(new MultiField());
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