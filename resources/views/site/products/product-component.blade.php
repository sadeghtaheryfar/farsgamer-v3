<div wire:init="$set('readyToLoad', true)">

    {{ Breadcrumbs::view('site.components.breadcrumb', 'products.show', $product) }}

    <section class="overflow-hidden rounded-2xl bg-white pb-4 lg:pb-12">
        <div class="relative overflow-hidden">
            <img class="w-full" src="{{asset($product->category->image ?? '')}}" alt="">
            <div class="single-product-poster-overlayer absolute inset-0"></div>
        </div>
        <div class="px-4 max-w-3xl mt-8 mx-auto sm:mt-4 md:mt-0 lg:-mt-16 lg:items-center xl:-mt-20 2xl:-mt-24 2xl:max-w-4xl">
            <div class="grid gap-8 lg:gap-0 xl:flex xl:gap-8" wire:ignore>
			
                <div>
                    @include('site.components.products.image-gallery')
                </div>
				
                @include('site.components.products.info')

            </div>
			
            @include('site.components.products.form')
        </div>
		
    </section>

    @include('site.homes.best-sellers',
        ['products' => $relatedProducts,
         'title' => 'محصولات مرتبط',
          'route' => route('products'),
          'icon' => ''])

    @include('site.components.products.content')

    <section class="grid gap-4 mt-4 2xs:grid-cols-2 md:grid-cols-4">
        @foreach($banners as $banner)
            <a href="{{$banner['url']}}" class="flex"><img class="w-full rounded-lg" src="{{asset($banner['image'])}}" alt=""></a>
        @endforeach
    </section>


	<div>

	@if($needUpload)
	
 
	<div class="popup" data-popup="popup-1" wire:ignore.self>
    <div class="popup-inner">
        <h1 class="py-2">
		<strong>قوانین استفاده </strong>
		</h1>
		
       <div class="popup-scroll">
	   	<ul class="check-list">
		   @foreach($law as $key => $item)
				<li class"my-2 d-flex">
					<span>-  </span>  {!! $item->value !!}
				</li>
			@endforeach
			{{ $law->links('site.components.pagination2') }}
		</ul>
			
		</div>
		@if($page == $law->lastPage() )
		<div class="form-check d-flex py-4">
			<input class="form-check" type="checkbox" value="1" wire:model.defer="lawOK" id="flexCheckDefault">
			<label class="form-check-label" style="font-size:12px;margin-top: 3px;
    margin-right: 5px;" for="flexCheckDefault">
				قوانین را خوانده ام و قبول می کنم
			</label>
		</div>
		@endif
        <p><a class="btn btn-sm btn-danger" data-popup-close="popup-1" href="#">بستن</a></p>
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
	@endif

	</div>

</div>