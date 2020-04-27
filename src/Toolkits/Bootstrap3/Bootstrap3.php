<?php


namespace Kyanag\Form\Toolkits\Bootstrap3;

use Kyanag\Form\Contracts\AbstractForm;

class Bootstrap3 extends AbstractForm
{

    protected $attributes = [
        'class' => [
            'form-horizontal'
        ],
        'role' => "form",
    ];

}