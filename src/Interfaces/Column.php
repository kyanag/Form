<?php

namespace Kyanag\Form\Interfaces;

interface Column
{
    /**
     * @param $scene mixed 场景
     *      用于判断字段是否活动
     * @return bool
     */
    public function isActive($scene);

    public function getLabel();

    /**
     * class_name
     * @return string
     */
    public function getFieldClass();
}