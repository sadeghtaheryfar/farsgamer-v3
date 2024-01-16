<div class="swiper-slide swiper-slide-prudect-box-new">
    <div class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
        <a class="show-swiper-slide-prudect flex-box flex-column" href="{{ route('products.show', $product->slug) }}">
            @if ($product->status == \App\Models\Product::STATUS_AVAILABLE)
                <div>
                    <img class="w-full" src="{{ asset($product->image) }}" alt="">
                </div>
            @elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE)
                <div class="relative">
                    <img class="w-full" src="{{ asset($product->image) }}" alt="">

                    <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center rounded-xl">
                        <p class="text-white font-medium">
                            {{ \App\Models\Product::getProductsStatus()[$product->status] }}
                        </p>
                    </div>
                </div>
            @elseif($product->status == \App\Models\Product::STATUS_COMING_SOON)
                <div class="relative">
                    <img class="w-full" src="{{ asset($product->image) }}" alt="">

                    <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center rounded-xl">
                        <p class="text-white font-medium">
                            {{ \App\Models\Product::getProductsStatus()[$product->status] }}
                        </p>
                    </div>
                </div>
            @elseif($product->status == \App\Models\Product::STATUS_TOWARDS_THE_END)
                <div class="relative">
                    <img class="w-full" src="{{ asset($product->image) }}" alt="">

                    <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center rounded-xl">
                        <p class="text-white font-medium">
                            {{ \App\Models\Product::getProductsStatus()[$product->status] }}
                        </p>
                    </div>
                </div>
            @endif

            <div>
                <span>{{ $product->title }}</span>
            </div>

            @if ($product->price_with_discount == 0)
                <div>
                    <div class="price">
                        <span>قیمت متغییر</span>
                    </div>
                </div>
            @else
                @if ($product->is_active_discount)
                    <div>
                        <div class="price flex gap-1.5 justify-center">
                            <div class="font-semibold leading-4 grid">
                                {{-- price after discount --}}
                                <p>{{ number_format($product->price_with_discount) }}</p>
                                {{-- price before discount --}}
                                <p class="line-through text-gray2-700 flex items-center justify-end">
                                    {{ number_format($product->price) }}</p>
                            </div>

                            <div class="grid gap-1">
                                <p class="text-sm">تومان</p>
                                {{-- discount precedence --}}
                                <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs">
                                    {{ $product->discount_percentage }}%</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div>
                        <div class="price">
                            <span>{{ number_format($product->price_with_discount) }}</span>

                            <span>تومان</span>
                        </div>
                    </div>
                @endif
            @endif
        </a>
    </div>
</div>