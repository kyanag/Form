<?php
/** @var \Kyanag\Form\Interfaces\ChooseElement $element */
/** @var \League\Plates\Template\Template $this */
?>
<div class="form-group row">
    <div class="col-md-2"><?=$this->e($element->label)?></div>
    <div class="col-md-10">
        <?php foreach($element->options as $option) {?>
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="<?=$this->e($element->name)?>"
                    <?=\Kyanag\Form\renderAttributes([
                        'checked' => boolval($option->selected),
                        'disabled' => boolval($option->disabled),
                        'readonly' => boolval($element->readonly),
                        'style' => $this->e($element->style)
                    ])?>
                >
                <label class="form-check-label">
                    <?=$this->e($option->title)?>
                </label>
            </div>
        <?php } ?>
        <div class="invalid-feedback"><?=$this->e($element->error)?></div>
        <small class="form-text text-muted"><?=$this->e($element->help)?></small>
    </div>
</div>