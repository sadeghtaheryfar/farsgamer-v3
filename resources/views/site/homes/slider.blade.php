<section id="slider-main-home">
    <div class="swiper mySwiper-main-home">
        <div class="swiper-wrapper">
            @foreach ($headerSlider as $item)
                <div class="swiper-slide swiper-slide-main-home">
                    <a href="{{ $item['url'] }}" class="w-full">
                        <img src="{{ asset($item['image']) }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next swiper-button-next-home"></div>
        <div class="swiper-button-prev swiper-button-prev-home"></div>
        <div class="swiper-pagination swiper-pagination-home"></div>
    </div>
</section>
