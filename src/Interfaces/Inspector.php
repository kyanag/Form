<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/3/29
 * Time: 23:20
 */

namespace Kyanag\Form\Interfaces;


interface Inspector
{

    public function title();

    public function tableName():string ;

    public function primaryKey():string;

    /**
     * @return Column[]
     */
    public function columns();

    public function relations();

}