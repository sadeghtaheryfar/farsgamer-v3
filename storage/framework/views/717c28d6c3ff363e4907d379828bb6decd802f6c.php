<?php $attributes = $attributes->exceptProps(['rating']); ?>
<?php foreach (array_filter((['rating']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($rating > 0): ?>
    <div class="rating-stars">
        <i class="<?php echo e(($rating >= 1) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"></i>
        <i class="<?php echo e(($rating >= 2) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"></i>
        <i class="<?php echo e(($rating >= 3) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"></i>
        <i class="<?php echo e(($rating >= 4) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"></i>
        <i class="<?php echo e(($rating >= 5) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"></i>
    </div>
<?php endif; ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/site/rating-star.blade.php ENDPATH**/ ?>