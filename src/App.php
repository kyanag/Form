<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 21:31
 */

namespace Kyanag\Form;


use Kyanag\Form\Traits\Globalizable;
use Psr\Container\ContainerInterface;

class App
{

    use Globalizable;

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;


    }

    public function createObject($config){
        $id = $config["@id"];
        if(!$this->container->has($id) && class_exists($id)){
            $object = new $id;
        }else{
            //di自己的 异常逻辑
            $object = $this->container->get($id);
        }
        unset($config['@id']);

        return $this->initObject($object, $config);
    }

    public function initObject($object, $config = []){
        foreach ($config as $name => $value){
            $method = "set" . ucfirst($name);
            if(method_exists($object, $method)){
                $object->{$method}($value);
            }else {
                $object->{$name} = $value;
            }
        }
        return $object;
    }

}