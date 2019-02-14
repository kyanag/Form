<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/25
 * Time: 15:49
 */

namespace Kyanag\Form;


class TreeNav
{

    public function isChildren($father, $children){
        return $father['id'] == $children['fid'];
    }

    public function toTreeList($items, $depth = 0){
        static $tree = [];
        foreach($items as $item){
            
        }
    }

}