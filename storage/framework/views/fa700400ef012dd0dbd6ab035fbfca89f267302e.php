<?php $attributes = $attributes->exceptProps(['active', 'icon' => 'menu-icon flaticon-home']); ?>
<?php foreach (array_filter((['active', 'icon' => 'menu-icon flaticon-home']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li class="menu-item <?php echo e($active ? 'menu-item-active' : ''); ?>" aria-haspopup="true">
    <a <?php echo $attributes->merge(['class'=> 'menu-link']); ?>>
        <i class="<?php echo e($icon); ?>"><span></span></i>
        <span class="menu-text"><?php echo e($slot); ?></span>
    </a>
</li>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/sidebar-link.blade.php ENDPATH**/ ?>