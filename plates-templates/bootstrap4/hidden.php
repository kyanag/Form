<?php
/** @var \Kyanag\Form\Interfaces\Element $element */
/** @var \League\Plates\Template\Template $this */
?>
<input
    name="<?=$this->e($element->name)?>"
    value="<?=$this->e($element->value)?>"
    type="hidden"
    <?=\Kyanag\Form\renderAttributes([
        'class' => $this->e($element->class),
        'id' => $this->e($element->id),
        'disabled' => boolval($element->disabled),
    ])?>
>