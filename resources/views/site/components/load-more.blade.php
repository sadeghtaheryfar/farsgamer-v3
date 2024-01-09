@if ($paginator->hasPages())
    <div class="text-center">
        <button class="btn btn-primary" type="button" wire:click="loadMore('{{$paginator->getPageName()}}')">نمایش بیشتر</button>
    </div>
@endif