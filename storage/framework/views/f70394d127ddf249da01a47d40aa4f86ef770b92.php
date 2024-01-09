<?php $attributes = $attributes->exceptProps(['id', 'label', 'help', 'required' => false]); ?>
<?php foreach (array_filter((['id', 'label', 'help', 'required' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-12">
    <label for="<?php echo e($id); ?>"><?php echo e($label); ?> <?php echo e($required ? '*' : ''); ?></label>
    <textarea id="<?php echo e($id); ?>" <?php echo $attributes->merge(['class'=> 'form-control']); ?>></textarea>
    <?php if(isset($help)): ?>
        <small class="text-muted"><?php echo e($help); ?></small>
    <?php endif; ?>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/textarea.blade.php ENDPATH**/ ?>