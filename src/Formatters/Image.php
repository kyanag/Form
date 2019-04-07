<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/3
 * Time: 20:52
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Fields\Number;
use Kyanag\Form\Interfaces\FormatterInterface;
use Kyanag\Form\Traits\FormatterConfiguration;

class Image implements FormatterInterface
{

    use FormatterConfiguration;

    /**
     * @Number(label="宽度")
     */
    public $width;

    /**
     * @Number(label="宽度")
     */
    public $height;


    public $domain = "/";


    public function __invoke($value, $record = [], $index = null)
    {
        return <<<EOF
<a href="javascript" class="thumbnail">
    <img src="{$value}" alt="通用的占位符缩略图">
</a>
EOF;
;
    }

}