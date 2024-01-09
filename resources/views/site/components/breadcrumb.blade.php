@unless ($breadcrumbs->isEmpty())
    <ol class="breadcrumb mb-4">
        @foreach ($breadcrumbs as $breadcrumb)
            @if (!is_null($breadcrumb->url) && !$loop->last)
                <li class="breadcrumb__link"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                <span>/</span>
            @else
                <li class="breadcrumb__link">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endunless
