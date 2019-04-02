<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/3/31
 * Time: 22:02
 */

namespace Kyanag\Form\Core;

use Kyanag\Form\Interfaces\Column as IColumn;

class ActiveColumn implements IColumn
{

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
    public function on_list($scenario = null){
        return isset($this->config['on_list']) ? $this->config['on_list'] : true;
    }

    public function on_edit($scenario = null) {
        return isset($this->config['on_edit']) ? $this->config['on_edit'] : true;
    }

    public function searcher()
    {
        // TODO: Implement searcher() method.
    }

    public function showFormatter($scenario = null)
    {
        // TODO: Implement showFormatter() method.
    }

    public function editFormatter($scenario = null)
    {
        // TODO: Implement editFormatter() method.
    }
}