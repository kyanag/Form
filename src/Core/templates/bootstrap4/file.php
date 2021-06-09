<?php
/** @var \Kyanag\Form\Interfaces\Element $element */
/** @var \League\Plates\Template\Template $this */
?>
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="<?=$this->e($element->id)?>"><?=$this->e($element->label)?></label>
    <div class="col-md-10">
        <div class="custom-file">
            <input
                name="<?=$this->e($element->name)?>"
                value="<?=$this->e($element->value)?>"
                type="file"
                class="custom-file-input <?=$this->e($element->class)?>"
                <?=\Kyanag\Form\renderAttributes([
                    'id' => $this->e($element->id),
                    'readonly' => boolval($element->readonly),
                    'disabled' => boolval($element->disabled),
                    'placeholder' => $this->e($element->placeholder),
                    'style' => $this->e($element->style),
                ])?>
            >
            <label class="custom-file-label" for="validatedCustomFile"></label>
        </div>
        <div class="invalid-feedback"><?=$this->e($element->error)?></div>
        <small class="form-text text-muted"><?=$this->e($element->help)?></small>
    </div>
</div>
