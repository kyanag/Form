<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/3/31
 * Time: 22:02
 */

namespace Kyanag\Form\Core;

use Kyanag\Form\Fields\Text;
use Kyanag\Form\Formatters\Same;
use Kyanag\Form\Interfaces\Column as IColumn;
use Kyanag\Form\Interfaces\FormatterInterface;
use function Kyanag\Form\object_create;

class ActiveColumn implements IColumn
{

    public $label;

    public $name;

    public $fieldClass = Text::class;

    public $help;

    public $rules;

    public $on_list = true;

    public $on_edit = true;

    public $showFormatter;

    public $editFormatter;

    public function label()
    {
        return $this->label;
    }


    public function name()
    {
        return $this->name;
    }

    public function toField(){
        $object = [
            "@id" => $this->fieldClass,
            'name' => $this->name(),
            'label' => $this->label(),
            'help' => $this->help(),
        ];
        return object_create($object);
    }

    public function help()
    {
        return $this->help;
    }

    public function rules(){
        return [];
    }

    /**
     * @return bool
     */
    public function on_list($scenario = null):bool {
        return boolval($this->on_list);
    }

    public function on_edit($scenario = null):bool {
        return boolval($this->on_edit);
    }

    /**
     * @param null $scenario
     * @return FormatterInterface|null
     */
    public function showFormatter($scenario = null)
    {
        if(is_callable($this->showFormatter)){
            $formatter = $this->showFormatter;
        }else{
            $formatter = object_create([
                "@id" => Same::class
            ]);
        }
        return $formatter;
    }

    /**
     * @param null $scenario
     * @return FormatterInterface|null
     */
    public function editFormatter($scenario = null)
    {
        if(isset($this->config['showFormatter'])){
            $formatter = object_create($this->editFormatter);
        }else{
            $formatter = object_create([
                "@id" => Same::class
            ]);
        }
        return $formatter;
    }
}