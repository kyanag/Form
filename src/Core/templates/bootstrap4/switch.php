<?php
/** @var \Kyanag\Form\Interfaces\Element $element */
/** @var \League\Plates\Template\Template $this */
?>
<div class="form-group row">
    <div class="col-md-2"><?=$this->e($element->label)?></div>
    <div class="col-md-10">
        <div class="custom-control custom-switch">
            <input class="custom-control-input" type="checkbox"
                name="<?=$this->e($element->name)?>"
                value="1"
                <?=\Kyanag\Form\renderAttributes([
                    'checked' => boolval($element->value),
                    'id' => $this->e($element->id),
                    'readonly' => boolval($element->readonly),
                    'disabled' => boolval($element->disabled),
                    'style' => $this->e($element->style)
                ])?>
            >
            <label class="custom-control-label" for="<?=$this->e($element->id)?>">
                <?=$this->e($element->help)?>
            </label>
            <div class="invalid-feedback"><?=$this->e($element->error)?></div>
        </div>

    </div>
</div>
