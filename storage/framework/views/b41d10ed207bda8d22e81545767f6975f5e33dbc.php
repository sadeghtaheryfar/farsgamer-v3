<?php $attributes = $attributes->exceptProps(['title', 'mode', 'create']); ?>
<?php foreach (array_filter((['title', 'mode', 'create']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div id="kt_subheader" class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5"><?php echo e($title); ?></h5>
                <?php echo $errors->any() ? '<span class="text-danger">مشکلی پیش آمده</span>' : ''; ?>

            </div>
        </div>
        <div class="d-flex align-items-center">
            <?php switch($mode):
                case (\App\Http\Controllers\Admin\BaseComponent::MODE_NONE): ?>
                <?php if($create): ?>
                    <a class="btn btn-light-primary font-weight-bolder btn-sm" href="<?php echo e($create); ?>">افزودن</a>
                <?php endif; ?>
                <?php break; ?>

                <?php case (\App\Http\Controllers\Admin\BaseComponent::MODE_CREATE): ?>
                    <div class="btn btn-light-primary font-weight-bolder btn-sm" wire:click="store()">ذخیره</div>
                <?php break; ?>

                <?php case (\App\Http\Controllers\Admin\BaseComponent::MODE_UPDATE): ?>
                    <div class="btn btn-light-primary font-weight-bolder btn-sm" wire:click="update()">بروزرسانی</div>
                <?php break; ?>

            <?php endswitch; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/components/admin/subheader.blade.php ENDPATH**/ ?>