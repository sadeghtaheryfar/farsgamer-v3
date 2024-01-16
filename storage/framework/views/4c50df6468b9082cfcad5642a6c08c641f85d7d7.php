<?php $attributes = $attributes->exceptProps(['title', 'active','icons']); ?>
<?php foreach (array_filter((['title', 'active','icons']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li class="menu-item menu-item-submenu <?php echo e($active ? 'menu-item-open' : ''); ?>" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <i class="menu-icon <?php echo e($icons); ?>"></i>
        <span class="menu-text"><?php echo e($title); ?></span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu" kt-hidden-height="80" style="<?php echo e($active ? '' : 'display: none; overflow: hidden;'); ?>">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <?php echo e($slot); ?>

        </ul>
    </div>
</li><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/components/admin/multiplesidebar-link.blade.php ENDPATH**/ ?>