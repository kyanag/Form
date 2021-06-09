<?php
/** @var \Kyanag\Form\Interfaces\Element $element */
/** @var \League\Plates\Template\Template $this */
?>
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="<?=$this->e($element->id)?>"><?=$this->e($element->label)?></label>
    <div class="col-md-10">
        <input
            name="<?=$this->e($element->name)?>"
            value="<?=$this->e($element->value)?>"
            type="range"
            class="form-control-range <?=$this->e($element->class)?>"
            <?=\Kyanag\Form\renderAttributes([
                'id' => $this->e($element->id),
                'readonly' => boolval($element->readonly),
                'disabled' => boolval($element->disabled),
                'placeholder' => $this->e($element->placeholder),
                'style' => $this->e($element->style),

                'min' => floatval($element->min ?: 0),
                'max' => floatval($element->max ?: 100),
                'step' => floatval($element->step ?: 1)
            ])?>
        >
        <div class="invalid-feedback"><?=$this->e($element->error)?></div>
        <small class="form-text text-muted"><?=$this->e($element->help)?></small>
    </div>
</div>
