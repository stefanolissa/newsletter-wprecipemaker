<?php
/* @var $options array containing all the options of the current block */
/* @var $fields NewsletterFields */
?>
    
<div class="tnp-field-row">
    <div class="tnp-field-col-3">
        <?php $fields->select_number('max', 'Max', 1, 20) ?>
    </div>
    <div class="tnp-field-col-3">
        <?php $fields->yesno('title', 'Show title?') ?>
    </div>
    <div class="tnp-field-col-3">
        <?php $fields->yesno('description', 'Show description?') ?>
    </div>
    <div style="clear: both"></div>
</div>

<!-- Here we should add category/tag filters -->

<?php // Always add that at the bottom ?>
<?php $fields->block_commons() ?>



