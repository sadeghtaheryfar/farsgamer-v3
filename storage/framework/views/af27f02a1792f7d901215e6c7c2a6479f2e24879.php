<?php $attributes = $attributes->exceptProps(['id', 'label', 'help', 'required' => false,'class' => 'form-control' ,'with' => 12]); ?>
<?php foreach (array_filter((['id', 'label', 'help', 'required' => false,'class' => 'form-control' ,'with' => 12]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-md-<?php echo e($with); ?> col-12">
    <label for="<?php echo e($id); ?>"><?php echo e($label); ?> <?php echo e($required ? '*' : ''); ?></label>
    <input id="<?php echo e($id); ?>" <?php echo $attributes->merge(['class'=> ($class) ]); ?>>
    <?php if(isset($help)): ?>
        <small class="text-muted"><?php echo e($help); ?></small>
    <?php endif; ?>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/components/admin/forms/input.blade.php ENDPATH**/ ?>