<?php


namespace Kyanag\Form;


use Kyanag\Form\Interfaces\Element;
use Throwable;

/**
 * 无法被渲染
 * Class CannotBeRenderedException
 * @package Kyanag\Form
 */
class CannotBeRenderedException extends \Exception
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var Element
     */
    protected $element;

    public function __construct($type, Element $element = null, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->type = $type;
        $this->element = $element;
        parent::__construct($message, $code, $previous);
    }

    public function getType(){
        return $this->type;
    }

    public function getElement(){
        return $this->element;
    }
}