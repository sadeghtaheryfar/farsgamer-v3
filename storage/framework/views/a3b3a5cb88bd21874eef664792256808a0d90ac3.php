<?php $attributes = $attributes->exceptProps(['id', 'label', 'help', 'required' => false]); ?>
<?php foreach (array_filter((['id', 'label', 'help', 'required' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-12">
    <label for="<?php echo e($id); ?>"><?php echo e($label); ?> <?php echo e($required ? '*' : ''); ?></label>
    <input id="<?php echo e($id); ?>" <?php echo $attributes->merge(['class'=> 'form-control p-datepicker']); ?>

    x-data
           x-init="$('#<?php echo e($id); ?>').pDatepicker({
                initialValue: false,
                autoClose: true,
                calendarType: 'gregorian',
                calendar: {
                    'persian': {
                    'locale': 'en',
                    'showHint': true,
                    'leapYearMode': 'algorithmic'
                    },
                    'gregorian': {
                        'locale': 'en',
                        'showHint': true
                    },
                },
                toolbox: {
                    'enabled': true,
                    'calendarSwitch': {
                    'enabled': false,
                    },
                },
                format: 'YYYY-MM-DD',
                onSelect: function () {
                    $dispatch('input', $('#<?php echo e($id); ?>').val())
                }
                });">
    <?php if(isset($help)): ?>
        <small class="text-muted"><?php echo e($help); ?></small>
    <?php endif; ?>
</div>


































<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/datepicker.blade.php ENDPATH**/ ?>