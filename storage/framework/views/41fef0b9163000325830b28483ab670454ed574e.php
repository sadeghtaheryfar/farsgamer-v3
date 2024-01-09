<?php $attributes = $attributes->exceptProps(['id', 'label', 'options', 'help', 'required' => false,'with' => 12,'keyValue'=>false]); ?>
<?php foreach (array_filter((['id', 'label', 'options', 'help', 'required' => false,'with' => 12,'keyValue'=>false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-md-<?php echo e($with); ?> col-12">
    <label for="<?php echo e($id); ?>"><?php echo e($label); ?> <?php echo e($required ? '*' : ''); ?></label>
    <select id="<?php echo e($id); ?>" <?php echo $attributes->merge(['class'=> 'form-control']); ?>>
        <option value="" selected>انتخاب کنید...</option>
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($keyValue ? $value : $key); ?>"><?php echo e($value); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <?php if(isset($help)): ?>
        <small class="text-muted"><?php echo e($help); ?></small>
    <?php endif; ?>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/dropdown.blade.php ENDPATH**/ ?>