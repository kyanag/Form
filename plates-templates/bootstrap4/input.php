<?php
/** @var \Kyanag\Form\Core\Element $element */
/** @var \League\Plates\Template\Template $this */
?>
<div class="form-group">
    <label class="form-label"><?=$this->e($element->label)?></label>
    <input
        <?php if($element->id){ ?>
        id="<?=$this->e($element->id)?>"
        <?php } ?>
            name="<?=$this->e(\Kyanag\Form\toHtmlName($element->name))?>"
            value="<?=$this->e($element->value)?>"
            type="text"
            class="form-control <?=$this->e($element->class)?>"
        <?php if($element->readonly === true){ ?>readonly<?php } ?>
        <?php if($element->disable === true){ ?>disabled<?php } ?>
        <?php if($element->placeholder){ ?>placeholder="<?=$this->e($element->placeholder)?>"<?php } ?>
        <?php if($element->style){ ?>style="<?=$this->e($element->style)?>"<?php } ?>
    >
    <div class="invalid-feedback"><?=$this->e($element->error)?></div>
    <small class="form-text text-muted"><?=$this->e($element->help)?></small>
</div>