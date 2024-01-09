<?php $attributes = $attributes->exceptProps(['active','icons', 'icon' => 'flaticon-home']); ?>
<?php foreach (array_filter((['active','icons', 'icon' => 'flaticon-home']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li class="menu-item <?php echo e($active ? 'menu-item-active' : ''); ?>" aria-haspopup="true">
    <a <?php echo $attributes->merge(['class'=> 'menu-link']); ?>>
        <i class="menu-icon <?php echo e($icons); ?>"><span></span></i>
        <span class="menu-text"><?php echo e($slot); ?></span>
    </a>
</li>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/sidebar-link.blade.php ENDPATH**/ ?>