<div class="d-flex justify-content-between">
    <div class="form-inline">
        @if($searchAble ?? true)
            <label for="search">{{ auth()->user()->translate('جستجو') }}  :</label>
            <input id="search" type="text" class="form-control ml-1" wire:model="search">
        @endif
    </div>
    <div class="form-inline">
        <label for="per-page">{{ auth()->user()->translate('تعداد') }} :</label>
        <select id="per-page" class="form-control pr-3 ml-1" wire:model="perPage">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
</div>