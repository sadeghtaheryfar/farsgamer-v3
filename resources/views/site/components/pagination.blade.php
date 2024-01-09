@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <button class="pagination__btn">
                    <i class="icon-angle-right"></i>
                </button>
            </li>
        @else
            <li>
                <button type="button" class="pagination__btn" wire:click="previousPage">
                    <i class="icon-angle-right"></i>
                </button>
            </li>
        @endif
        @foreach ($elements as $element)

            @if (is_string($element))
                <li>
                    <button type="button" class="pagination__btn">{{ $element }}</button>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li>
                            <button type="button" class="pagination__btn pagination__btn--active" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                        </li>
                    @else
                        <li>
                            <button type="button" class="pagination__btn" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button type="button" class="pagination__btn" wire:click="nextPage">
                    <i class="icon-angle-left"></i>
                </button>
            </li>
        @else
            <li>
                <button type="button" class="pagination__btn">
                    <i class="icon-angle-left"></i>
                </button>
            </li>
        @endif
    </ul>
@endif