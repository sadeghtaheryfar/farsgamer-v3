<div class="d-flex justify-content-between">
    <div class="form-inline">
        <?php if($searchAble ?? true): ?>
            <label for="search">جستجو :</label>
            <input id="search" type="text" class="form-control ml-1" wire:model="search">
        <?php endif; ?>
    </div>
    <div class="form-inline">
        <label for="per-page">تعداد :</label>
        <select id="per-page" class="form-control pr-3 ml-1" wire:model="perPage">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/admin/components/advanced-table.blade.php ENDPATH**/ ?>