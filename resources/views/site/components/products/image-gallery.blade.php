<div class="single-product-image-gallery">

    <div class="swiper-container single-product-image-gallery__big-image group cursor-grab">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="{{asset($product->image)}}" alt="{{$product->title}}"></div>
            @if($product->media)
                @foreach(explode(',', $product->media) as $item)
                    <div class="swiper-slide"><img src="{{asset($item)}}" alt="{{$product->title}}"></div>
                @endforeach
            @endif
        </div>
        <p class="absolute bottom-0 p-2 z-1 bg-gray-900 bg-opacity-80 text-gray-200 w-full text-center text-sm opacity-0 group-hover:opacity-100 transition duration-200 ease-in-out">
            از راست به چپ یا چپ به راست بکشید</p>
    </div>

    <div class="swiper-container single-product-image-gallery__thumb-images">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="cursor-pointer" src="{{asset($product->image)}}" alt="{{$product->title}}"></div>
            @if($product->media)
                @foreach(explode(',', $product->media) as $item)
                    <div class="swiper-slide"><img class="cursor-pointer" src="{{asset($item)}}" alt="{{$product->title}}"></div>
                @endforeach
            @endif
        </div>
    </div>

</div>
