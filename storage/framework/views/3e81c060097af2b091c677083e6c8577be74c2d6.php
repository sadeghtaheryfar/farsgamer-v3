<?php $attributes = $attributes->exceptProps(['options', 'formKey']); ?>
<?php foreach (array_filter((['options', 'formKey']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-12 d-flex justify-content-between">
    <h6 class="d-inline">options</h6>
    <button class="btn btn-success" wire:click="addOption(<?php echo e($formKey); ?>)">افزودن</button>
</div>

<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionKey => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group col-12 d-flex">
        <div class="flex-fill">
            <label for="option_value_<?php echo e($optionKey); ?>">value</label>
            <input id="option_value_<?php echo e($optionKey); ?>" type="text" class="form-control"
                   wire:model.defer="formOptions.<?php echo e($optionKey); ?>.value">
        </div>
        <div class="flex-fill ml-1">
            <label for="option_price_<?php echo e($optionKey); ?>">price</label>
            <input id="option_price_<?php echo e($optionKey); ?>" type="number" class="form-control"
                   wire:model.defer="formOptions.<?php echo e($optionKey); ?>.price">
        </div>
        <div class="flex-fill ml-1">
            <label for="option_license_<?php echo e($optionKey); ?>">لاینسیس (آدرس محصول را وارد کنید)</label>
            <input id="option_license_<?php echo e($optionKey); ?>" type="text" class="form-control"
                   wire:model.defer="formOptions.<?php echo e($optionKey); ?>.license">
        </div>
        <div class="d-flex align-items-end mx-1">
            <button type="button" class="btn btn-danger" wire:click="deleteOption(<?php echo e($formKey); ?>,<?php echo e($optionKey); ?>)">حذف</button>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/form-options.blade.php ENDPATH**/ ?>