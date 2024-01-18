@if (sizeof($products) > 0)
    <section wire:ignore>
        <div class="flex items-center justify-between mb-4 mt-8 lg:mb-6 lg:mt-10">
            <div class="flex gap-2 items-center">
                @if ($icon != '')
                    <img class="w-6 h-6" src="{{ asset($icon) }}" alt="آتش">
                @endif
                <h2 class="font-bold text-lg">{{ $title }}</h2>
            </div>
            <a class="flex gap-2 items-center" href="{{ route('products') }}?category=steam-game&sort=latest">
                <span class="text-sm lg:text-base">مشاهده همه</span>
                <i class="icon-angle-left text-xl"></i>
            </a>
        </div>
        <div class="basic-product-slider swiper-container relative pb-8">
            <div class="swiper-wrapper">
                @foreach ($products as $product)
                    @include('site.components.products.product-box')
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination bottom-0"></div>
        </div>
    </section>
@endif
