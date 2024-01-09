<div  class="overflow-hidden">
	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'محصول']]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'محصول']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
	<div class="row">
    	<div class="col-12">
			<div class="content d-flex flex-column-fluid">
					<div class="col-12">

						<div>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.validation-errors','data' => []]); ?>
<?php $component->withName('admin.forms.validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						</div>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => ''.e($product->title).' ','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e($product->title).' ','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
						<section class=" rounded-2xl bg-white  m-auto">
							
							<div class="px-4 max-w-3xl  mx-auto sm:mt-4 md:mt-0  lg:items-center  2xl:max-w-4xl">
								
								
								<form class="text-center lg:text-right rounded-2xl border border-gray-200 p-6 mt-4" wire:submit.prevent="addToCart()">
									<div class="py-4">
										<h1 class="font-bold text-xl mb-2 sm:text-2xl lg:text-xl">
											<?php echo e($product->title); ?>

										</h1>
									</div>
									<div class="grid gap-4 lg:grid-cols-2">
										<?php echo $__env->make('site.components.products.partner-form-builder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									</div>

									<div class="mt-8 mb-2 flex items-center justify-between">
										<div class="flex items-center gap-2">
											<label for="quantity">تعداد</label>
											<div class="relative">
												<input id="quantity" class="form-control w-20" type="number" min="1" wire:model="quantity">
												<?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
												<small class="text-red"><?php echo e($message); ?></small>
												<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
											</div>
										</div>
										<div class="grid justify-end text-left">
											<span class="text-xs mb-1">مبلغ پرداختی</span>
											<?php if($priceWithDiscount == 0): ?>
												<div class="flex items-center gap-1">
													<span class="font-bold text-2xl tracking-tighter">قیمت متغیر</span>
												</div>
											<?php else: ?>

													<div class="flex items-center gap-1">
														<span class="font-bold text-2xl tracking-tighter"><?php echo e(number_format($price)); ?></span>
														<span>تومان</span>
													</div>
												
											<?php endif; ?>
										</div>
									</div>
									
									<div class="row">
										
												<div class="col-12 col-md-6">
													<label>نام
														<input class="text-field" type="text" placeholder="نام مشتری" wire:model.defer="name">
													</label>
													<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<div class="col-12 col-md-6">
													<label>نام خانوادگی
														<input class="text-field" type="text" placeholder="نام خانوادگی مشتری" wire:model.defer="family">
													</label>
													<?php $__errorArgs = ['family'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<div class="col-12 col-md-6">
													<label>ایمیل
														<input class="text-field" type="email" placeholder="ایمیل مشتری" wire:model.defer="email">
													</label>
													<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<div class="col-12 col-md-6">
													<label>شماره همراه مشتری
														<input class="text-field" type="tel" placeholder="شماره همراه مشتری" wire:model.defer="mobile">
													</label>
													<?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<?php if($addressForm === true): ?>
												<div class="col-12 col-md-6">
													<label>استان مورد نظر
													<input class="text-field" type="text" placeholder=" استان مشتری" wire:model.defer="province">
													</label>
													<?php $__errorArgs = ['province'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<div class="col-12 col-md-6">
													<label>شهر مورد نظر
													<input class="text-field" type="text" placeholder="شهر مشتری" wire:model.defer="city">
													</label>
													<?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<div  class="col-12">
													<label>کد پستی
													<input class="text-field" type="text" placeholder="کد پستی مشتری" wire:model.defer="postalCode">
													</label>
													<?php $__errorArgs = ['postalCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<div class="col-12">
													<label for="address">لطفا آدرس دقیق مشتری را وارد کنید
														<textarea class="text-field h-auto" rows="4" placeholder="برای مثال: خیابان 17 شهریور - پلاک 100"
																wire:model.defer="address"></textarea>
													</label>
													<?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												<?php endif; ?>
												<div class="col-12">
													<label for="description">توضیحات بیشتر (اختیاری)
														<textarea class="text-field h-auto" rows="4" placeholder="توضیحات مربوط به سفارش شما"
																wire:model.defer="description"></textarea>
													</label>
													<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
													<small class="text-red"><?php echo e($message); ?></small>
													<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
												</div>
												 
											<label for="useWallet" class="bg-gray-50 rounded-xl mt-4 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200" >
												<input id="useWallet" type="checkbox"  value="1" wire:model="useWallet">
												<i class="fa fa-wallet fa-4x text-info"></i>
												<div class="grid">
													<p class="font-semibold">استفاده از کیف پول (موجودی : <?php echo e(number_format(auth()->user()->balance)); ?>تومان) </p>
													
												</div>
											</label>
											<label class="bg-gray-50 rounded-xl mt-4 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200" for="zarinpal">
												<input id="zarinpal" type="radio" name="gateway" value="zarinpal" wire:model="gateway">
												<img class="rounded-xl w-16" src="<?php echo e(asset('site/images/zarinpal-sm.png')); ?>" alt="">
												<div class="grid">
													<p class="font-semibold">زرین ‌پال</p>
													<p class="text-xs font-medium">پرداخت به وسیله کلیه کارت های عضو شبکه شتاب</p>
												</div>
											</label>
											
											
											<?php $__errorArgs = ['gateway'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
											<div class="bg-pink font-medium flex items-center justify-center gap-2 p-2 rounded-2xl">
												<i class="icon-exclamation-square"></i>
												<p class="text-sm"><?php echo e($message); ?></p>
											</div>
											<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
										</div>

									<div class="lg:flex lg:items-end lg:justify-between">
										<div class="grid my-4 lg:my-0 grid-cols-2 2xs:grid-cols-4 gap-2 justify-center font-light text-xs leading-4 lg:mb-1">
											
										</div>
										
											
										
										<?php if($product->status == \App\Models\Product::STATUS_AVAILABLE): ?>
											<button class="btn btn-small w-full sm:max-w-60 form-submit btn-primary font-medium text-base" type="submit"
													wire:loading.attr="disabled">ادامه خرید</button>
										<?php elseif($product->status == \App\Models\Product::STATUS_COMING_SOON): ?>
											<span class="btn btn-small w-full sm:max-w-60 form-submit btn-primary font-semibold"><?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?></span>
										<?php elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE): ?>
											<span class="btn btn-small w-full sm:max-w-60 form-submit btn-primary font-semibold"><?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?></span>
										<?php endif; ?>

									</div>
									<?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
									<p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e($message); ?></p>
									<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
								</form>
							</div>
							
						</section>
							
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

						 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					</div>
			</div>
	</div>
					
					
				

			
</div>


<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/partner/orders/store-new-order.blade.php ENDPATH**/ ?>