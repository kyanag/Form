<?php
/** @var \Kyanag\Form\Interfaces\Element $element */
/** @var \League\Plates\Template\Template $this */
?>
<div class="form-group row">
    <label class="col-md-2 col-form-label" for="<?=$this->e($element->id)?>"><?=$this->e($element->label)?></label>
    <div class="col-md-10">
        <select
            name="<?=$this->e($element->name)?>"
            class="form-control <?=$this->e($element->class)?>"
            <?=\Kyanag\Form\renderAttributes([
                'id' => $this->e($element->id),
                'readonly' => boolval($element->readonly),
                'disabled' => boolval($element->disabled),
                'placeholder' => $this->e($element->placeholder),
                'style' => $this->e($element->style),
                'multiple' => boolval($element->multi),
            ])?>
        >
            <?php foreach($element->options as $option){ ?>
            <option
                <?=\Kyanag\Form\renderAttributes([
                    'value' => $this->e($option->title),
                    'disabled' => boolval($option->disabled),
                    'selected' => boolval($option->selected),
                ])?>
            ><?=$option->title?></option>
            <?php } ?>
        </select>
        <div class="invalid-feedback"><?=$this->e($element->error)?></div>
        <small class="form-text text-muted"><?=$this->e($element->help)?></small>
    </div>
</div>