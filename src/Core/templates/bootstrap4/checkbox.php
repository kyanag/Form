<?php
/** @var \Kyanag\Form\Interfaces\ChooseElement $element */
/** @var \League\Plates\Template\Template $this */

$unique = uniqid("checkbox-");
?>
<div class="form-group row">
    <div class="col-md-2"><?=$this->e($element->label)?></div>
    <div class="col-md-10">
        <?php
        /**
         * @var  $index
         * @var \Kyanag\Form\Interfaces\Option $option
         */
        foreach ($element->options as $index => $option) {?>
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="<?=$this->e($element->name)?>"
                    <?=\Kyanag\Form\renderAttributes([
                        'id' => "{$unique}-{$index}",
                        'checked' => boolval($option->selected),
                        'disabled' => boolval($option->disabled),
                        'value' => $this->e($option->value),
                    ])?>
                >
                <label class="form-check-label" for="<?="{$unique}-{$index}"?>">
                    <?=$this->e($option->title)?>
                </label>
            </div>
        <?php } ?>
        <div class="invalid-feedback"><?=$this->e($element->error)?></div>
        <small class="form-text text-muted"><?=$this->e($element->help)?></small>
    </div>
</div>
