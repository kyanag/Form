<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/3
 * Time: 20:52
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Fields\Number;
use Kyanag\Form\Interfaces\Analysable;
use Kyanag\Form\Fields\Text;

/**
 * @label 图片
 */
class Image implements Analysable
{
    /**
     * @Number(label="宽度")
     */
    public $width;

    /**
     * @Number(label="宽度")
     */
    public $height;


    /**
     * @var string
     * @Text(label="域")
     */
    public $domain = "/";


    public function __invoke($value, $record = [], $index = null)
    {
        $value = $this->domain . $value;
        return <<<EOF
<a href="javascript:void()" class="thumbnail">
    <img src="{$value}" alt="通用的占位符缩略图">
</a>
EOF;
;
    }

}