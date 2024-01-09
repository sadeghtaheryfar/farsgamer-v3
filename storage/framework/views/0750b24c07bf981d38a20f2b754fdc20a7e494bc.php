<?php $attributes = $attributes->exceptProps(['title']); ?>
<?php foreach (array_filter((['title']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo $attributes->merge(['class'=> 'form-group col-12']); ?>>
    <h6><?php echo e($title); ?></h6>
    <?php echo e($slot); ?>

</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/header.blade.php ENDPATH**/ ?>