<?php


namespace Kyanag\Form\Supports;


use Kyanag\Form\Interfaces\ElementInterface;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\ElementTrait;

abstract class ElementCollectionProvider implements ElementInterface
{

    use ElementTrait;
}