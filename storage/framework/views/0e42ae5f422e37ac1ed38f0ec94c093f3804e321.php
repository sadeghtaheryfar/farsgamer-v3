<?php $attributes = $attributes->exceptProps(['id', 'size' => '', 'title', 'footer']); ?>
<?php foreach (array_filter((['id', 'size' => '', 'title', 'footer']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="modal fade" id="<?php echo e($id); ?>Modal" data-backdrop="static" data-keyboard="false"
     aria-labelledby="<?php echo e($id); ?>ModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable <?php echo e($size); ?>">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e($title); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo e($slot); ?>

            </div>
            <div class="modal-footer">
                <?php echo e($footer); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/modal.blade.php ENDPATH**/ ?>