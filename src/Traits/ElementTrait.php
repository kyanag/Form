<?php


namespace Kyanag\Form\Traits;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;

/**
 * Trait ElementTrait
 * @package Kyanag\Form\Traits
 * @mixin ElementInterface
 */
trait ElementTrait
{

    /**
     * @var array<Renderable>
     */
    protected $elements = [];

    public function addRenderable(Renderable $renderable)
    {
        $this->elements[] = $renderable;
        return $renderable;
    }

}