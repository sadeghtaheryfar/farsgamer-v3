<form class="text-center lg:text-right rounded-2xl border border-gray-200 p-6 mt-4" wire:submit.prevent="addToCart()">
    <div class="grid gap-4 lg:grid-cols-2">
        @include('site.components.products.form-builder')
		
    </div>
	<div>
	@if($needUpload)
			<div class="relative col-12 py-2">
				<div class="rounded-2xl">
					
					
						<legend  class="float-none w-auto"><p style="font-size:15px">تصویر صفحه اول شناسنامه یا کارت ملی:</p></legend>
						<div x-data="{ isUploading: false, progress: 0 }"
						x-on:livewire-upload-start="isUploading = true"
						x-on:livewire-upload-finish="isUploading = false"
						x-on:livewire-upload-error="isUploading = false"
						x-on:livewire-upload-progress="progress = $event.detail.progress">
						<input type="file" id="file" wire:model="file" aria-label="file" class="form-control" />

							<div class="mt-2" x-show="isUploading">
								در حال اپلود تصویر...
								<progress max="100" x-bind:value="progress"></progress>
							</div>
							<br>
							<small class="text-info">حداکثر حجم مجاز : 2 مگابایت</small>
                		</div>
					
				
					@error('file')
						<small class="text-red">{{$message}}</small>
					@enderror
				</div>
			</div>
		<small data-popup-open="popup-1" class="btn btn-sm btn-warning" role="button">جهت مشاهده قوانین کلیک کنید</small>	
		@endif
	</div>

    <div class="mt-8 mb-2 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <label for="quantity">تعداد</label>
            <div class="relative">
                <input id="quantity" class="text-field w-20" type="number" min="1" wire:model="quantity">
                @error('quantity')
                <small class="text-red">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="grid justify-end text-left">
            <span class="text-xs mb-1">مبلغ پرداختی</span>
            @if($priceWithDiscount == 0)
                <div class="flex items-center gap-1">
                    <span class="font-bold text-2xl tracking-tighter">قیمت متغیر</span>
                </div>
            @else
                @if($product->is_active_discount)
                    <div class="flex gap-1.5 justify-center">
                        <div class="font-semibold leading-4 grid">
                            {{--price after discount--}}
                            <p class="font-bold text-2xl tracking-tighter">{{number_format($priceWithDiscount)}}</p>
                            {{--price before discount--}}
                            <p class="line-through text-gray2-700 flex items-center justify-end">{{number_format($price)}}</p>
                        </div>

                        <div class="grid gap-1">
                            <p class="text-sm">تومان</p>
                            {{--discount precedence--}}
                            <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs flex items-center">{{$product->discount_percentage}}%</div>
                        </div>
                    </div>
                @else
                    <div class="flex items-center gap-1">
                        <span class="font-bold text-2xl tracking-tighter">{{number_format($priceWithDiscount)}}</span>
                        <span>تومان</span>
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="lg:flex lg:items-end lg:justify-between">
        <div class="grid my-4 lg:my-0 grid-cols-2 2xs:grid-cols-4 gap-2 justify-center font-light text-xs leading-4 lg:mb-1">
            <div class="text-primary text-center">
                <i class="icon-lock w-12 h-8 flex items-center justify-center mx-auto text-lg"></i>
                <p>حفظ اطلاعات</p>
            </div>
            <div class="text-primary text-center">
                <i class="icon-support w-12 h-8 flex items-center justify-center mx-auto text-lg"></i>
                <p>پشتیبانی 24 ساعته</p>
            </div>
            <div class="text-primary text-center">
                <i class="icon-ticket w-12 h-8 flex items-center justify-center mx-auto text-lg"></i>
                <p>ضمانت پرداخت</p>
            </div>
            <div class="text-primary text-center">
                <i class="icon-bigclock w-12 h-8 flex items-center justify-center mx-auto text-lg"></i>
                <p>ثبت سفارش فوری</p>
            </div>
        </div>
        @if($product->status == \App\Models\Product::STATUS_AVAILABLE || $product->status == \App\Models\Product::STATUS_TOWARDS_THE_END)
            <button class="btn btn-2xl w-full sm:max-w-60 form-submit btn-primary font-medium text-base" type="submit"
                    wire:loading.attr="disabled">افزودن به سبد خرید</button>
        @elseif($product->status == \App\Models\Product::STATUS_COMING_SOON)
            <span class="btn btn-2xl w-full sm:max-w-60 form-submit btn-primary font-semibold">{{\App\Models\Product::getProductsStatus()[$product->status]}}</span>
        @elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE)
            <span class="btn btn-2xl w-full sm:max-w-60 form-submit btn-primary font-semibold">{{\App\Models\Product::getProductsStatus()[$product->status]}}</span>
        @endif

    </div>
    @error('error')
    <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
    @enderror
</form>