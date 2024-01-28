<section class="margin-vetical-2 section-home">
    <div>
        <div id="box-header-best-sellers">
            <div class="swiper mySwiper-main-best-sellers">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide-best-sellers">
                        <div class="item-best-sellers width-max">
                            <div class="header-item-best-sellers width-max flex-box flex-justify-space">
                                <span>پر فروش ها</span>

                                <a class="link-header-best-sellers" href="{{ route('products') }}">
                                    <span>مشاهده بیشتر</span>
                                </a>
                            </div>

                            <div class="message-item-best-sellers width-max">
                                @foreach ($BestSellersNew as $product)
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <div class="item-message-item-best-sellers flex-box flex-justify-space">
                                            <div class="img-item-message-sellers">
                                                <img src="{{ asset($product->image) }}" alt="">
                                            </div>

                                            <div
                                                class="text-item-message-sellers width-max flex-box flex-right flex-column">
                                                <div class="header-item-message-sellers">
                                                    {{ $product->title }}
                                                </div>

                                                @if ($product->price_with_discount == 0)
                                                    <div class="price-item-message-sellers">
                                                        <span>قیمت متغییر</span>
                                                    </div>
                                                @else
                                                    @if ($product->is_active_discount)
                                                        <div class="price-off-item-message-sellers flex-box">
                                                            <span>{{ $product->discount_percentage }}%</span>

                                                            <div class="box-price-item-message-sellers">
                                                                <span>{{ number_format($product->price) }}</span>
                                                                <span>تومان</span>
                                                            </div>
                                                        </div>

                                                        <div class="price-item-message-sellers">
                                                            <span>{{ number_format($product->price_with_discount) }}</span>
                                                            <span>تومان</span>
                                                        </div>
                                                    @else
                                                        <div class="price-item-message-sellers">
                                                            <span>{{ number_format($product->price) }}</span>
                                                            <span>تومان</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-best-sellers">
                        <div class="item-best-sellers width-max swiper-slide-best-sellers-center">
                            <div class="header-item-best-sellers width-max flex-box flex-justify-space">
                                <span>تخفیفات ویژه</span>

                                <a class="link-header-best-sellers" href="{{ route('products') }}">
                                    <span>مشاهده بیشتر</span>
                                </a>
                            </div>

                            <div class="message-item-best-sellers width-max">
                                @foreach ($SpecialDiscountsNew as $product)
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <div class="item-message-item-best-sellers flex-box flex-justify-space">
                                            <div class="img-item-message-sellers">
                                                <img src="{{ asset($product->image) }}" alt="">
                                            </div>

                                            <div
                                                class="text-item-message-sellers width-max flex-box flex-right flex-column">
                                                <div class="header-item-message-sellers">
                                                    {{ $product->title }}
                                                </div>

                                                @if ($product->price_with_discount == 0)
                                                    <div class="price-item-message-sellers">
                                                        <span>قیمت متغییر</span>
                                                    </div>
                                                @else
                                                    @if ($product->is_active_discount)
                                                        <div class="price-off-item-message-sellers flex-box">
                                                            <span>{{ $product->discount_percentage }}%</span>

                                                            <div class="box-price-item-message-sellers">
                                                                <span>{{ number_format($product->price) }}</span>
                                                                <span>تومان</span>
                                                            </div>
                                                        </div>

                                                        <div class="price-item-message-sellers">
                                                            <span>{{ number_format($product->price_with_discount) }}</span>
                                                            <span>تومان</span>
                                                        </div>
                                                    @else
                                                        <div class="price-item-message-sellers">
                                                            <span>{{ number_format($product->price) }}</span>
                                                            <span>تومان</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-best-sellers">
                        <div class="item-best-sellers width-max">
                            <div class="header-item-best-sellers width-max flex-box flex-justify-space">
                                <span>گیفت کارت ها</span>

                                <a class="link-header-best-sellers" href="{{ route('products') }}">
                                    <span>مشاهده بیشتر</span>
                                </a>
                            </div>

                            <div class="message-item-best-sellers width-max">
                                @foreach ($GiftCardsNew as $product)
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <div class="item-message-item-best-sellers flex-box flex-justify-space">
                                            <div class="img-item-message-sellers">
                                                <img src="{{ asset($product->image) }}" alt="">
                                            </div>

                                            <div
                                                class="text-item-message-sellers width-max flex-box flex-right flex-column">
                                                <div class="header-item-message-sellers">
                                                    {{ $product->title }}
                                                </div>

                                                @if ($product->price_with_discount == 0)
                                                    <div class="price-item-message-sellers">
                                                        <span>قیمت متغییر</span>
                                                    </div>
                                                @else
                                                    @if ($product->is_active_discount)
                                                        <div class="price-off-item-message-sellers flex-box">
                                                            <span>{{ $product->discount_percentage }}%</span>

                                                            <div class="box-price-item-message-sellers">
                                                                <span>{{ number_format($product->price) }}</span>
                                                                <span>تومان</span>
                                                            </div>
                                                        </div>

                                                        <div class="price-item-message-sellers">
                                                            <span>{{ number_format($product->price_with_discount) }}</span>
                                                            <span>تومان</span>
                                                        </div>
                                                    @else
                                                        <div class="price-item-message-sellers">
                                                            <span>{{ number_format($product->price) }}</span>
                                                            <span>تومان</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination swiper-pagination-best-sellers flex-box"></div>
            </div>
        </div>
    </div>
</section>