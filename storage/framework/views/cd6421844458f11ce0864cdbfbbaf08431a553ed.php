<?php $attributes = $attributes->exceptProps(['id', 'conditions', 'formKey', 'editAble' => true]); ?>
<?php foreach (array_filter((['id', 'conditions', 'formKey', 'editAble' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="form-group col-12 d-flex justify-content-between">
    <h6 class="d-inline">Condition</h6>
    <?php if($editAble): ?>
        <button type="button" class="btn btn-success" wire:click="addCondition(<?php echo e($formKey); ?>)">افزودن</button>
    <?php endif; ?>
</div>

<?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conditionKey => $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-group col-12 d-flex">
        <div class="flex-fill">
            <label for="<?php echo e($id); ?>condition_value_<?php echo e($conditionKey); ?>">name</label>
            <input id="<?php echo e($id); ?>condition_value_<?php echo e($conditionKey); ?>" type="text" class="form-control"
                   wire:model.defer="formConditions.<?php echo e($conditionKey); ?>.value">
        </div>
        <div class="flex-fill ml-1">
            <label for="<?php echo e($id); ?>condition_target_<?php echo e($conditionKey); ?>">value</label>
            <input id="<?php echo e($id); ?>condition_target_<?php echo e($conditionKey); ?>" type="text" class="form-control"
                   wire:model.defer="formConditions.<?php echo e($conditionKey); ?>.target">
        </div>
        <div class="flex-fill ml-1">
            <label for="<?php echo e($id); ?>condition_visibility_<?php echo e($conditionKey); ?>">visibility</label>
            <select id="<?php echo e($id); ?>condition_visibility_<?php echo e($conditionKey); ?>" class="form-control"
                    wire:model.defer="formConditions.<?php echo e($conditionKey); ?>.visibility">
                <option value="">انتخاب کنید...</option>
                <option value="hide">hide</option>
                <option value="show">show</option>
            </select>
        </div>
        <?php if($editAble): ?>
            <div class="d-flex align-items-end mx-1">
                <button type="button" class="btn btn-danger" wire:click="deleteCondition(<?php echo e($formKey); ?>,<?php echo e($conditionKey); ?>)">حذف</button>
            </div>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/components/admin/forms/form-conditions.blade.php ENDPATH**/ ?>