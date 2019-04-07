<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/4/1
 * Time: 22:03
 */

namespace Kyanag\Form\Formatters;


use Kyanag\Form\Fields\Button;
use Kyanag\Form\Fields\Text;
use Kyanag\Form\Interfaces\FormatterInterface;
use function Kyanag\Form\object_create;
use Kyanag\Form\Traits\FormatterConfiguration;
use Kyanag\Form\Fields\OnOff;
use Kyanag\Form\Widgets\A;

/**
 * Class ActionBar
 * @package Kyanag\Form\Formatters
 */
class ActionBar implements FormatterInterface
{

    use FormatterConfiguration;

    /**
     * @OnOff(label="显示按钮")
     * @var bool
     */
    public $show = true;

    /**
     * @OnOff(label="编辑按钮")
     * @var bool
     */
    public $edit = true;

    /**
     * @OnOff(label="删除按钮")
     * @var bool
     */
    public $delete = true;

    /**
     * restful 基本路由地址
     * exp: posts
     * @Text(label="restful路由地址")
     * @var string
     */
    public $baseRoute = "";


    public function __invoke($value, $record = [], $index = null)
    {
        $button = [];
        if($this->show){
            $href = $this->baseRoute . "/" . $value;
            $button[] = object_create([
                '@id' => A::class,
                'class' => "btn btn-outline-primary btn-sm",
                'innerHtml' => "查看",
                'href' => $href,
            ]);
        }
        if($this->edit){
            $href = $this->baseRoute . "/" . $value . "/edit";
            $button[] = object_create([
                '@id' => A::class,
                'class' => "btn btn-outline-primary btn-sm",
                'innerHtml' => "编辑",
                'href' => $href,
            ]);
        }
        if($this->delete){
            $button[] = object_create([
                '@id' => A::class,
                'class' => "btn btn-outline-primary btn-sm",
                'innerHtml' => "编辑",
                'href' => $href,
                'data' => [
                    'confirm' => true,
                    'method' => "delete",
                    'payload' => "{}",
                    'fetch-url' => $this->baseRoute . "/" . $value,
                ],
            ]);
        }
    }

}