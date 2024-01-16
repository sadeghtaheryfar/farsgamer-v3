<?php $attributes = $attributes->exceptProps(['id', 'label', 'required' => false, 'help', 'image']); ?>
<?php foreach (array_filter((['id', 'label', 'required' => false, 'help', 'image']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(gettype($image) == 'string'): ?>
    <div class="form-group col-12">
        <?php $__currentLoopData = explode(',', $image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img src="<?php echo e(asset($item)); ?>" alt="<?php echo e($id); ?>" width="150px" height="150px" class="mr-1 mb-1 imglist"/>
			<p>نام : <?php echo e(asset($item)); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<div class="form-group col-12 ">
    <label for="<?php echo e($id); ?>"><?php echo e($label); ?> <?php echo e($required ? '*' : ''); ?></label>
    <div class="input-group">
        <input id="<?php echo e($id); ?>" <?php echo $attributes->merge(['class'=> 'form-control']); ?>

        x-data
               x-init="$('#lfm-<?php echo e($id); ?>').filemanager('image'); $('#<?php echo e($id); ?>').on('change', function () { $dispatch('input', $(this).val()) })"
               >
        <div class="input-group-append">
            <button id="lfm-<?php echo e($id); ?>" type="button" class="btn btn-outline-secondary"
                    data-input="<?php echo e($id); ?>" data-preview="holder">انتخاب
            </button>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/components/admin/forms/lfm-standalone.blade.php ENDPATH**/ ?>