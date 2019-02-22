<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/14
 * Time: 21:52
 */

namespace Kyanag\Form\Widgets;


use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Element;

/**
 * Class BaseElement
 * @property $tagName
 * @package Kyanag\Form\Widgets
 */
class BaseElement extends Element
{

    protected $tagName;

    protected $isDoubleClosed = true;

    protected $html;

    protected function setTagName($tagName){
        $this->tagName = $tagName;
        return $this;
    }

    protected function setHtml($html){
        $this->html = $html;
    }

    public function getHtml(){
        if($this->html instanceof Renderable){
            return $this->html->render();
        }
        return $this->html;
    }

    public function setIsDoubleClosed(bool $bool){
        $this->isDoubleClosed = $bool;
        return $this;
    }

    public function render()
    {
        return $this->isDoubleClosed ? "<{$this->tagName} {$this->renderAttributes()}>{$this->getHtml()}</{$this->tagName}>" : "<{$this->tagName} {$this->renderAttributes()}/>";
    }

}