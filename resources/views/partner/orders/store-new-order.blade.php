<div  class="overflow-hidden">
	<x-admin.subheader title="محصول" />
	<div class="row">
    	<div class="col-12">
			<div class="content d-flex flex-column-fluid">
					<div class="col-12">

						<div>
							<x-admin.forms.validation-errors/>
						</div>
						<x-admin.forms.form title="{{$product->title}} " :mode="$mode" >
						<section class=" rounded-2xl bg-white  m-auto">
							
							<div class="px-4 max-w-3xl  mx-auto sm:mt-4 md:mt-0  lg:items-center  2xl:max-w-4xl">
								
								
								<form class="text-center lg:text-right rounded-2xl border border-gray-200 p-6 mt-4" wire:submit.prevent="addToCart()">
									<div class="py-4">
										<h1 class="font-bold text-xl mb-2 sm:text-2xl lg:text-xl">
											{{$product->title}}
										</h1>
									</div>
									<div class="grid gap-4 lg:grid-cols-2">
										@include('site.components.products.partner-form-builder')
									</div>

									<div class="mt-8 mb-2 flex items-center justify-between">
										<div class="flex items-center gap-2">
											<label for="quantity">تعداد</label>
											<div class="relative">
												<input id="quantity" class="form-control w-20" type="number" min="1" wire:model="quantity">
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

													<div class="flex items-center gap-1">
														<span class="font-bold text-2xl tracking-tighter">{{number_format($price)}}</span>
														<span>تومان</span>
													</div>
												
											@endif
										</div>
									</div>
									
									<div class="row">
										
												<div class="col-12 col-md-6">
													<label>نام
														<input class="text-field" type="text" placeholder="نام مشتری" wire:model.defer="name">
													</label>
													@error('name')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												<div class="col-12 col-md-6">
													<label>نام خانوادگی
														<input class="text-field" type="text" placeholder="نام خانوادگی مشتری" wire:model.defer="family">
													</label>
													@error('family')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												<div class="col-12 col-md-6">
													<label>ایمیل
														<input class="text-field" type="email" placeholder="ایمیل مشتری" wire:model.defer="email">
													</label>
													@error('email')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												<div class="col-12 col-md-6">
													<label>شماره همراه مشتری
														<input class="text-field" type="tel" placeholder="شماره همراه مشتری" wire:model.defer="mobile">
													</label>
													@error('mobile')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												@if($addressForm === true)
												<div class="col-12 col-md-6">
													<label>استان مورد نظر
													<input class="text-field" type="text" placeholder=" استان مشتری" wire:model.defer="province">
													</label>
													@error('province')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												<div class="col-12 col-md-6">
													<label>شهر مورد نظر
													<input class="text-field" type="text" placeholder="شهر مشتری" wire:model.defer="city">
													</label>
													@error('city')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												<div  class="col-12">
													<label>کد پستی
													<input class="text-field" type="text" placeholder="کد پستی مشتری" wire:model.defer="postalCode">
													</label>
													@error('postalCode')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												<div class="col-12">
													<label for="address">لطفا آدرس دقیق مشتری را وارد کنید
														<textarea class="text-field h-auto" rows="4" placeholder="برای مثال: خیابان 17 شهریور - پلاک 100"
																wire:model.defer="address"></textarea>
													</label>
													@error('address')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												@endif
												<div class="col-12">
													<label for="description">توضیحات بیشتر (اختیاری)
														<textarea class="text-field h-auto" rows="4" placeholder="توضیحات مربوط به سفارش شما"
																wire:model.defer="description"></textarea>
													</label>
													@error('description')
													<small class="text-red">{{$message}}</small>
													@enderror
												</div>
												 
											<label for="useWallet" class="bg-gray-50 rounded-xl mt-4 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200" >
												<input id="useWallet" type="checkbox"  value="1" wire:model="useWallet">
												<i class="fa fa-wallet fa-4x text-info"></i>
												<div class="grid">
													<p class="font-semibold">استفاده از کیف پول (موجودی : {{ number_format(auth()->user()->balance) }}تومان) </p>
													
												</div>
											</label>
											<label class="bg-gray-50 rounded-xl mt-4 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200" for="zarinpal">
												<input id="zarinpal" type="radio" name="gateway" value="zarinpal" wire:model="gateway">
												<img class="rounded-xl w-16" src="{{asset('site/images/zarinpal-sm.png')}}" alt="">
												<div class="grid">
													<p class="font-semibold">زرین ‌پال</p>
													<p class="text-xs font-medium">پرداخت به وسیله کلیه کارت های عضو شبکه شتاب</p>
												</div>
											</label>
											
											
											@error('gateway')
											<div class="bg-pink font-medium flex items-center justify-center gap-2 p-2 rounded-2xl">
												<i class="icon-exclamation-square"></i>
												<p class="text-sm">{{$message}}</p>
											</div>
											@enderror
										</div>

									<div class="lg:flex lg:items-end lg:justify-between">
										<div class="grid my-4 lg:my-0 grid-cols-2 2xs:grid-cols-4 gap-2 justify-center font-light text-xs leading-4 lg:mb-1">
											
										</div>
										
											
										
										@if($product->status == \App\Models\Product::STATUS_AVAILABLE)
											<button class="btn btn-small w-full sm:max-w-60 form-submit btn-primary font-medium text-base" type="submit"
													wire:loading.attr="disabled">ادامه خرید</button>
										@elseif($product->status == \App\Models\Product::STATUS_COMING_SOON)
											<span class="btn btn-small w-full sm:max-w-60 form-submit btn-primary font-semibold">{{\App\Models\Product::getProductsStatus()[$product->status]}}</span>
										@elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE)
											<span class="btn btn-small w-full sm:max-w-60 form-submit btn-primary font-semibold">{{\App\Models\Product::getProductsStatus()[$product->status]}}</span>
										@endif

									</div>
									@error('error')
									<p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
									@enderror
								</form>
							</div>
							
						</section>
							
							<x-admin.forms.separator/>

						</x-admin.forms.form>
					</div>
			</div>
	</div>
					
					
				

			
</div>


