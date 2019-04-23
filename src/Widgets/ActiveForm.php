<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/23
 * Time: 23:28
 */

namespace Kyanag\Form\Widgets;


use Kyanag\Form\Field;
use Kyanag\Form\FieldBuilder;
use Kyanag\Form\Fields\Checkbox;
use Kyanag\Form\Fields\Editor;
use Kyanag\Form\Fields\Hidden;
use Kyanag\Form\Fields\Radio;
use Kyanag\Form\Fields\Select;
use Kyanag\Form\Fields\Text;
use Kyanag\Form\Fields\Textarea;
use Kyanag\Form\Interfaces\Renderable;

class ActiveForm implements Renderable
{

    protected $builders = [];

    public function text($name, $label = null){
        return $this->newFieldBuilder(new Text())->name($name)->label($label);
    }

    public function hidden($name){
        return $this->newFieldBuilder(new Hidden())->name($name);
    }

    public function radio($name, $label = null){
        return $this->newFieldBuilder(new Radio())->name($name)->label($label);
    }

    public function select($name, $label = null){
        return $this->newFieldBuilder(new Select())->name($name)->label($label);
    }

    public function multiSelect($name, $label = null){
        return $this->select($name, $label)->multiple()->value([]);
    }

    public function checkbox($name, $label = null){
        return $this->newFieldBuilder(new Checkbox())->name($name)->label($label)->multiple();
    }

    public function textarea($name, $label){
        return $this->newFieldBuilder(new Textarea())->name($name)->label($label);
    }

    public function editor($name, $label){
        return $this->newFieldBuilder(new Editor())->name($name)->label($label);
    }

    public function hasMany($name, $label = null, callable $callback){
        $builder = $
    }

    public function hasOne($name, $label, callable $callback){

    }

    public function render()
    {
        // TODO: Implement render() method.
    }

    protected function newFieldBuilder(Field $field){
        $builder = new FieldBuilder($field);
        $this->builders[] = $builder;
        return $builder;
    }
}