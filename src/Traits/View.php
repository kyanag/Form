<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/7
 * Time: 11:19
 */

namespace Kyanag\Form\Traits;


trait View
{

    public function renderView($filePath, $data){
        extract($data);
        include $filePath;
    }

}