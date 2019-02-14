<?php

namespace Kyanag\Form\Interfaces;

use Kyanag\Form\Field;

/**
 * 表描述
 */
interface Inspector
{

    /**
     * 主键
     * @return string
     */
    public function primaryKey();

    public function comment();

    /**
     * @return Column[]
     */
    public function columns();

    /**
     * @return Field[]
     */
    public function fields();
}