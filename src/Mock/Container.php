<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/7
 * Time: 15:37
 */

namespace Kyanag\Form\Mock;


use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{

    protected $mappings = [];

    public function get($id)
    {
        if($this->has($id)){
            return $this->mappings[$id];
        }else{
            throw new \Exception("class not found");
        }
    }

    public function has($id)
    {
        return isset($this->mappings[$id]);
    }

}