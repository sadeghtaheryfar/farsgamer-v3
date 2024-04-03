<section class="basic-image-slider swiper-container rounded-2xl overflow-hidden lg:-mt-4">
<div class="swiper-wrapper">
        @foreach($headerSlider as $item)
            <div class="swiper-slide rounded-2xl overflow-hidden">
                <a href="{{$item['url']}}">
                    <img src="{{asset($item['image'])}}" alt="">
                </a>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</section>