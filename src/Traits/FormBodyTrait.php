<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\Renderable;

trait FormBodyTrait
{

    /**
     * @var array<Renderable>
     */
    protected $elements = [];

    public function addElement(Renderable $renderable)
    {
        $this->elements[] = $renderable;
    }

}