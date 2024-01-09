<div class="lg:z-0 lg:grid lg:items-start lg:text-sm">
    <div>
        <h1 class="font-bold text-xl mb-2 sm:text-2xl lg:text-xl">{{$product->title}}</h1>
        <div class="flex items-center gap-2">
            <x-site.rating-star :rating="$avg"/>
			@if ($avg > 0)
            <span class="text-sm">(از {{$commentsCount}} کاربر)</span>
			@endif
        </div>
        <ul class="mt-6 space-y-2">
            <li>
                <svg class="w-6 h-6 inline-block"><use xlink:href="#svg-gem-red-sporkel"></use></svg>
                <span class="mr-1">شما با خرید این محصول <strong>{{$product->score}}</strong> امتیاز دریافت میکنید</span>
            </li>
			@if(($start_lottery))
				<li>
                	<i class="rating-stars__filled-star icon-star-filled mr-1"></i>
                	<span class="mr-1">شما با خرید این محصول <strong>{{$product->lottery}}</strong> شانس دریافت میکنید</span>
            	</li>
			@endif
			@if ($detail_display == 0)
            <li>{!! $product->short_description !!}</li>
			@elseif($detail_display == 1)
			<ul dir="rtl">
				@foreach($parameters as $key => $item)
					@if(!empty(@$item->name))
						<li>
							<p>
								<span style="font-size:14px">
									<strong>-</strong>
									{{@$item->name}} : {{ @$parametersValue[$key] }}
								</span>
							</p>
						</li>
					@endif
				@endforeach
			</ul>
			@elseif($detail_display == 2)
			<li>{!! $product->short_description !!}</li>
			<ul dir="rtl">
				@foreach($parameters as $key => $item)
					@if(!empty(@$item->name))
						<li>
							<p>
								<span style="font-size:14px">
									<strong>-</strong>
									{{@$item->name}} : {{ @$parametersValue[$key] }}
								</span>
							</p>
						</li>
					@endif
				@endforeach
			</ul>
			@endif

        </ul>
		
    </div>
</div>
