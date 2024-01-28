<?php $attributes = $attributes->exceptProps(['content' , 'class' ,'style' => false]); ?>
<?php foreach (array_filter((['content' , 'class' ,'style' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <div class="form-group">
        <button type="button" <?php echo e($attributes); ?> style="<?php echo e($style); ?>" class="btn btn-<?php echo e($class); ?>">
            <?php echo e($content); ?>

        </button>
    </div>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/components/admin/button.blade.php ENDPATH**/ ?>