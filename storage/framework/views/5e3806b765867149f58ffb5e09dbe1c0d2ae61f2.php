<?php $attributes = $attributes->exceptProps(['id', 'col' => 12]); ?>
<?php foreach (array_filter((['id', 'col' => 12]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-<?php echo e($col); ?>">
    <div class="form-check form-check-inline">
        <input id="<?php echo e($id); ?>" type="checkbox" <?php echo $attributes->merge(['class'=> 'form-check-input']); ?>>
        <label for="<?php echo e($id); ?>" class="form-check-label">
            <?php echo e($slot); ?>

        </label>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/checkbox.blade.php ENDPATH**/ ?>