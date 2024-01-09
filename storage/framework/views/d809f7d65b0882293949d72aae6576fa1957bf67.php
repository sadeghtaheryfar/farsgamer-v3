<?php $attributes = $attributes->exceptProps(['title', 'mode']); ?>
<?php foreach (array_filter((['title', 'mode']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card mb-4 collapse <?php echo e($mode != \App\Http\Controllers\Admin\BaseComponent::MODE_NONE ? 'show' : ''); ?>">
    <div class="card-header">
        <h5>
            <?php echo e($mode == \App\Http\Controllers\Admin\BaseComponent::MODE_CREATE ? 'ثبت' : 'ویرایش'); ?> <?php echo e($title); ?>

        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <?php echo e($slot); ?>

        </div>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/form.blade.php ENDPATH**/ ?>