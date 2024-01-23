<div class="d-flex justify-content-between">
    <div class="form-inline">
        <?php if($searchAble ?? true): ?>
            <label for="search"><?php echo e(auth()->user()->translate('جستجو')); ?>  :</label>
            <input id="search" type="text" class="form-control ml-1" wire:model="search">
        <?php endif; ?>
    </div>
    <div class="form-inline">
        <label for="per-page"><?php echo e(auth()->user()->translate('تعداد')); ?> :</label>
        <select id="per-page" class="form-control pr-3 ml-1" wire:model="perPage">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/admin/components/advanced-table.blade.php ENDPATH**/ ?>