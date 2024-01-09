<?php $attributes = $attributes->exceptProps(['title', 'mode' => false, 'create'=> false]); ?>
<?php foreach (array_filter((['title', 'mode' => false, 'create'=> false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
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
                <h5 class="text-dark font-weight-bold my-1 mr-5"><?php echo e(auth()->user()->translate($title)); ?></h5>
                <?php echo $errors->any() ? '<span class="text-danger">'.auth()->user()->translate('مشکلی پیش آمده').'</span>' : ''; ?>

            </div>
        </div>
        <div class="d-flex align-items-center">
		<?php if($mode): ?>
            <?php switch($mode):
                case (\App\Http\Controllers\Admin\BaseComponent::MODE_NONE): ?>
                <?php if($create): ?>
                    <a class="btn btn-light-primary font-weight-bolder btn-sm" href="<?php echo e($create); ?>"><?php echo e(auth()->user()->translate('افزودن')); ?></a>
                <?php endif; ?>
                <?php break; ?>

                <?php case (\App\Http\Controllers\Admin\BaseComponent::MODE_CREATE): ?>
                    <div class="btn btn-light-primary font-weight-bolder btn-sm" wire:click="store()"><?php echo e(auth()->user()->translate('ذخیره')); ?></div>
                <?php break; ?>

                <?php case (\App\Http\Controllers\Admin\BaseComponent::MODE_UPDATE): ?>
                    <div class="btn btn-light-primary font-weight-bolder btn-sm" wire:click="update()"><?php echo e(auth()->user()->translate('بروزرسانی')); ?></div>
                <?php break; ?>

            <?php endswitch; ?>
		<?php endif; ?>	
        </div>
    </div>
</div>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/subheader.blade.php ENDPATH**/ ?>