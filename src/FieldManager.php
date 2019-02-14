<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/14
 * Time: 16:41
 */

namespace Kyanag\Form;


use Kyanag\Form\Fields\Text;
use Kyanag\Form\Fields\Radio;
use Kyanag\Form\Fields\Select;
use Kyanag\Form\Fields\Checkbox;
use Kyanag\Form\Fields\OnOff;
use Kyanag\Form\Fields\Number;
use Kyanag\Form\Fields\Textarea;
use Kyanag\Form\Fields\Editor;
use Kyanag\Form\Fields\Image;
use Kyanag\Form\Fields\File;
use Kyanag\Form\Fields\Datetime;
use Kyanag\Form\Fields\Password;

class FieldManager
{

    protected $fields = [];

    public function boot()
    {
        $fields = [
            "文本" => Text::class,
            "单选" => Radio::class,
            "下拉选择" => Select::class,
            "多选" => Checkbox::class,
            "开关" => OnOff::class,
            "数字" => Number::class,
            "多行文本" => Textarea::class,
            "富文本" => Editor::class,
            "图片" => Image::class,
            "文件" => File::class,
            "日期" => Datetime::class,
            "密码" => Password::class,
        ];
        $this->fields = $fields;
    }

    public function register($name, $class){
        $this->fields[$name] = $class;
        return $this;
    }

    public function toOptions()
    {
        $typeOptions = [];
        foreach ($this->fields as $name => $field){
            $typeOptions[] = [
                'name' => $name,
                'value' => $name
            ];
        }
        return $typeOptions;
    }
}