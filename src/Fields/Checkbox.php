<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/29
 * Time: 17:45
 */

namespace Kyanag\Form\Fields;


/**
 * @Annotation
 * @package Kyanag\Form\Fields
 */
class Checkbox extends Radio
{

    public $subAttributes = [
        'class' => [
            'form-check-input'
        ],
        'type' => "checkbox",
    ];

}