<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/3/31
 * Time: 22:02
 */

namespace Kyanag\Form\Core;

use Kyanag\Form\Formatters\Same;
use Kyanag\Form\Interfaces\Column as IColumn;
use Kyanag\Form\Interfaces\FormatterInterface;
use function Kyanag\Form\object_create;

class ActiveColumn implements IColumn
{

    public $label;

    public $name;

    public $help;

    public $rules = [];

    public $on_list = true;

    public $on_edit = true;

    public $filter;

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function label()
    {
        return $this->config['label'];
    }


    public function name()
    {
        return $this->config['name'];
    }

    public function help()
    {
        return isset($this->config['help']) ? $this->config['help']: null;
    }

    public function rules(){
        return [];
    }

    /**
     * @return bool
     */
    public function on_list($scenario = null):bool {
        return isset($this->config['on_list']) ? $this->config['on_list'] : true;
    }

    public function on_edit($scenario = null):bool {
        return isset($this->config['on_edit']) ? $this->config['on_edit'] : true;
    }

    public function searcher()
    {
        // TODO: Implement searcher() method.
    }

    /**
     * @param null $scenario
     * @return FormatterInterface|null
     */
    public function showFormatter($scenario = null)
    {
        if(isset($this->config['showFormatter'])){
            $formatter = object_create($this->config['showFormatter']);
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
            $formatter = object_create($this->config['editFormatter']);
        }else{
            $formatter = object_create([
                "@id" => Same::class
            ]);
        }
        return $formatter;
    }
}