<div class="width-max">
    <div>
        <div class="swiper mySwiper-header-product relative group">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                </div>

                @if ($product->media)
                    @foreach (explode(',', $product->media) as $item)
                        <div class="swiper-slide">
                            <img src="{{ asset($item) }}" alt="{{ $product->title }}">
                        </div>
                    @endforeach
                @endif
            </div>
            <p
                class="absolute bottom-0 p-2 z-1 bg-gray-900 bg-opacity-80 text-gray-200 w-full text-center text-sm opacity-0 group-hover:opacity-100 transition duration-200 ease-in-out">
                از راست به چپ یا چپ به راست بکشید</p>
        </div>
    </div>

    <div class="swiper-pagination swiper-pagination-page-prudect flex-box hide-item-mobile"></div>

    <div class="box-more-img-detalist-product flex-box">
        <div class="item-more-img-detalist-product">
            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
        </div>

        @if ($product->media)
            @foreach (explode(',', $product->media) as $key => $item)
                @if (count(explode(',', $this->product->media)) > 4 && $key == 2)
                    <div class="item-more-img-detalist-product last-more-img-detalist-product flex-box">
                        <img src="{{ asset($item) }}" alt="{{ $product->title }}">

                        <div class="flex-box" dir="ltr" data-bs-toggle="modal" data-bs-target="#modal-img-prudect">
                            <span>+{{ count(explode(',', $this->product->media)) - 3 }}</span>
                        </div>
                    </div>
                @break

            @else
                <div class="item-more-img-detalist-product">
                    <img src="{{ asset($item) }}" alt="{{ $product->title }}">
                </div>
            @endif
        @endforeach
    @endif
</div>
</div>

<!-- Modal ...................................................................................   -->
<div class="modal fade" id="modal-img-prudect" tabindex="-1" aria-labelledby="modal-request" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header flex-box flex-justify-space">
                <div class="header-modal-dashboard flex-box flex-column flex-aling-auto">
                    <span class="modal-title" id="exampleModalLabel">توضیحات</span>
                </div>

                <svg data-bs-dismiss="modal" class="cursor-pointer add-red-big" aria-label="Close" width="58"
                    height="58" viewBox="0 0 58 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.834 35.6863L36.1085 21.4118" stroke="#FF3838" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M36.1085 35.6863L21.834 21.4118" stroke="#FF3838" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

            </div>

            <div class="modal-body">
                <div class="swiper mySwiper-img-prudect">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide product-image-container">
                            <img class="product-image" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                        </div>

                        @if ($product->media)
                            @foreach (explode(',', $product->media) as $item)
                                <div class="swiper-slide product-image-container">
                                    <img class="product-image" src="{{ asset($item) }}" alt="{{ $product->title }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper-img-prudect-more">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                        </div>

                        @if ($product->media)
                            @foreach (explode(',', $product->media) as $key => $item)
                                <div class="swiper-slide">
                                    <img src="{{ asset($item) }}" alt="{{ $product->title }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>