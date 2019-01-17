<?php
/**
 * Created by PhpStorm.
 * User: ykgon
 * Date: 2019/1/14
 * Time: 21:52
 */

namespace Kyanag\Form;


class BaseElement extends Element
{

    protected $tagName;

    protected $isDoubleClosed = true;

    public function setTagName($tagName){
        $this->tagName = $tagName;
        return $this;
    }

    public function render()
    {
        return $this->isDoubleClosed ? "<{$this->tagName} {$this->renderAttributes()}></{$this->tagName}>" : "<{$this->tagName} {$this->renderAttributes()}/>";
    }

}