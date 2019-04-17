<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/16
 * Time: 10:59
 */

namespace Kyanag\Form\Core;


use Kyanag\Form\Field;
use function Kyanag\Form\object_create;
use Kyanag\Form\Fields\AutoComplete;
use Kyanag\Form\Fields\Datetime;
use Kyanag\Form\Fields\Hidden;
use Kyanag\Form\Fields\Image;
use Kyanag\Form\Fields\Select2;
use Kyanag\Form\Fields\Number;
use Kyanag\Form\Fields\Password;
use Kyanag\Form\Fields\Select;
use Kyanag\Form\Fields\Text;
use Kyanag\Form\Fields\Textarea;

class ColumnBuilder
{

    protected $config = [];


    public function data(array $data){
        $this->config['data'] = $data;
        return $this;
    }

    public function label($label){
        $this->config['label'] = $label;
        return $this;
    }

    public function name($name){
        $this->config['name'] = $name;
        if(!isset($this->config['label'])){
            $this->config['label'] = $name;
        }
        return $this;
    }

    public function value($value){
        $this->config['value'] = $value;
        return $this;
    }

    public function help($help){
        $this->config['help'] = $help;
        return $this;
    }

    public function options($options){
        if(!$options){
            $options = [];
        }
        $this->config['options'] = $options;
        return $this;
    }

    public static function text(){
        $static = new static();
        $static->config['fieldClass'] = Text::class;
        return $static;
    }

    public static function password(){
        $static = new static();
        $static->config['fieldClass'] = Password::class;
        return $static;
    }

    public static function hidden(){
        $static = new static();
        $static->config['fieldClass'] = Hidden::class;
        return $static;
    }

    public static function select(){
        $static = new static();
        $static->config['fieldClass'] = Select::class;
        return $static;
    }

    public static function dateTime(){
        $static = new static();
        $static->config['fieldClass'] = Datetime::class;
        return $static;
    }

    public static function multiSelect(){
        $static = new static();
        $static->config['fieldClass'] = Select2::class;
        return $static;
    }

    public static function textarea(){
        $static = new static();
        $static->config['fieldClass'] = Textarea::class;
        return $static;
    }

    public static function image(){
        $static = new static();
        $static->config['fieldClass'] = Image::class;
        return $static;
    }

    public static function number($min = null, $max = null){
        $static = new static();
        $static->config['fieldClass'] = Number::class;
        $static->config['min'] = $min;
        $static->config['max'] = $max;
        return $static;
    }

    public static function keywords(){
        $static = new static();
        $static->config['fieldClass'] = AutoComplete::class;
        return $static;
    }

    public function toField()
    {
        $config = $this->config;

        $config['@id'] = $config['fieldClass'];
        unset($config['fieldClass']);
        return object_create($config);
    }
}