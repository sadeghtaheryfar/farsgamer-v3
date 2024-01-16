<?php $attributes = $attributes->exceptProps(['title', 'mode' => false , 'desc' => false]); ?>
<?php foreach (array_filter((['title', 'mode' => false , 'desc' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="card mb-4 collapse <?php echo e($mode != \App\Http\Controllers\Admin\BaseComponent::MODE_NONE ? 'show' : ''); ?>">
<?php if(!empty($title)): ?>
    <div class="card-header">
        <h5>
            <?php echo e(!empty($mode) ? ($mode == \App\Http\Controllers\Admin\BaseComponent::MODE_CREATE ? auth()->user()->translate('ثبت') : auth()->user()->translate('ویرایش')) : ''); ?> <?php echo auth()->user()->translate($title); ?>

        </h5>
		<p class="text-gray">
			<?php echo e($desc); ?>

		</p>
    </div>
	<?php endif; ?>
    <div class="card-body">
        <div class="row">
            <?php echo e($slot); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/components/admin/forms/form.blade.php ENDPATH**/ ?>