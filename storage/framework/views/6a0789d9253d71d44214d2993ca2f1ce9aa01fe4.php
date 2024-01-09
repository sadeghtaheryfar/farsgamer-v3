<?php $attributes = $attributes->exceptProps(['id', 'label','data', 'value' => false]); ?>
<?php foreach (array_filter((['id', 'label','data', 'value' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="form-group col-12" wire:ignore>
        <label for="<?php echo e($id); ?>"> <?php echo e($label); ?> </label>
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>    
    <select id="<?php echo e($id); ?>" <?php echo e($attributes->wire('model')); ?>

            class="form-control select2" <?php echo $attributes->merge(['class'=> 'form-control']); ?>>
        <option value="">انتخاب</option>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option  value="<?php echo e($value ? $item : $key); ?>"><?php echo e($item); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(() => {
            $('#<?php echo e($id); ?>').select2()
            $('#<?php echo e($id); ?>').on('change', function (e) {
                var data = $('#<?php echo e($id); ?>').select2("val");
            window.livewire.find('<?php echo e($_instance->id); ?>').set('<?php echo e($attributes->wire("model")->value); ?>', data);
            });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/select2.blade.php ENDPATH**/ ?>