<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 21:43
 */

namespace Kyanag\Form\Traits;


trait Globalizable
{
    /**
     * @var static
     */
    protected static $instance;

    public static function formGlobal(){
        return static::$instance;
    }

    public function registerGlobal(){
        static::$instance = $this;
    }

}