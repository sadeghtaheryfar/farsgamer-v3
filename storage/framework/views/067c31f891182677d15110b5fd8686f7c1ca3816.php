<?php $attributes = $attributes->exceptProps(['id', 'label', 'required' => false, 'help']); ?>
<?php foreach (array_filter((['id', 'label', 'required' => false, 'help']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-12" wire:ignore>
    <label for="<?php echo e($id); ?>"><?php echo e($label); ?> <?php echo e($required ? '*' : ''); ?></label>
    <textarea id="<?php echo e($id); ?>" <?php echo $attributes->merge(['class'=> 'form-control']); ?>

    x-data="{text: <?php if ((object) ($attributes->wire('model')) instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')->value()); ?>')<?php echo e($attributes->wire('model')->hasModifier('defer') ? '.defer' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($_instance->id); ?>').entangle('<?php echo e($attributes->wire('model')); ?>')<?php endif; ?> }"
              x-init="CKEDITOR.replace('<?php echo e($id); ?>', {
                            filebrowserImageBrowseUrl: '/filemanager?type=Images',
                            filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
                            filebrowserBrowseUrl: '/filemanager?type=Files',
                            filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
                        });
                        CKEDITOR.instances.<?php echo e($id); ?>.on('change', function () {
                            $dispatch('input', CKEDITOR.instances.<?php echo e($id); ?>.getData())
                        });"
              x-text="CKEDITOR.instances.<?php echo e($id); ?>.setData(this.text); return this.text"></textarea>
    <?php if(isset($help)): ?>
        <small class="text-muted"><?php echo e($help); ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/text-editor.blade.php ENDPATH**/ ?>