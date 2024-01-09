@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
           
        @else
            <li>
                <button type="button" class="btn btn-sm btn-primary bordered  px-5" style="font-size:12px" wire:click="previousPage">
                    قبلی
                </button>
            </li>
        @endif
        

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button type="button" class="btn btn-sm btn-primary bordered px-5" style="font-size:12px" wire:click="nextPage">
                    بعدی
                </button>
            </li>
        @else
            
        @endif
    </ul>
@endif