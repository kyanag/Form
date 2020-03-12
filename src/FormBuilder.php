<?php


namespace Kyanag\Form;

use Kyanag\Form\Interfaces\FormBodyInterface;
use Kyanag\Form\Interfaces\FormDataInterface;
use Kyanag\Form\Interfaces\InputComponent;
use Kyanag\Form\Interfaces\Renderable;
use Kyanag\Form\Traits\FormDataTrait;

class FormBuilder implements FormDataInterface, Renderable
{

    use FormDataTrait;

    protected $body;

    /** @var array<string, InputComponent>  */
    protected $components = [];

    public function __construct(FormBodyInterface $body)
    {
        $this->body = $body;
    }

    public function render()
    {
        return $this->getBody()->render();
    }

    public function getBody(){
        return $this->body;
    }
}