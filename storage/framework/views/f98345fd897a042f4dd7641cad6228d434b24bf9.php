<?php $attributes = $attributes->exceptProps(['active', 'icon' , 'arrow' => '']); ?>
<?php foreach (array_filter((['active', 'icon' , 'arrow' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li>
    <a <?php echo $attributes->class(['nav-menu-item', 'nav-menu-item--active' => $active]); ?>>
        <i class="nav-menu-item__icon <?php echo e($icon); ?>"></i>
        <span class="nav-menu-item__title"><?php echo e($slot); ?></span>
		<?php echo $arrow == true ? '<i class="menu_proucts_arrow"></i>' : ''; ?>

    </a>
</li> 
 <?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/components/site/sidebar-link.blade.php ENDPATH**/ ?>