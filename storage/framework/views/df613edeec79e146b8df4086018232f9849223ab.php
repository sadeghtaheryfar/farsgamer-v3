<div class="grid gap-4 xl:grid-cols-12 xl:items-start xl:gap-8">
    <div class="xl:col-start-1 xl:col-end-9 2xl:col-end-10 xl:row-span-full overflow-hidden">
        <div class="cart-nav cart-nav--second-active overflow-x-auto">
            <div class="cart-nav__item">
                <div class="cart-nav__item-circle"></div>
                <div class="cart-nav__item-info">
                    <i class="icon-basket"></i>
                    <span>سبد خرید</span>
                </div>
            </div>
            <div class="cart-nav__item">
                <div class="cart-nav__item-circle"></div>
                <div class="cart-nav__item-info">
                    <i class="icon-user"></i>
                    <span>مشخصات سفارش</span>
                </div>
            </div>
            <div class="cart-nav__item">
                <div class="cart-nav__item-circle"></div>
                <div class="cart-nav__item-info">
                    <i class="icon-bag"></i>
                    <span>جزئیات سفارش</span>
                </div>
            </div>
        </div>
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            <form class="grid gap-8 md:grid-cols-2">
                <div>
                    <label>نام
                        <input class="text-field" type="text" placeholder="نام" wire:model.defer="name">
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
                <div>
                    <label>نام خانوادگی
                        <input class="text-field" type="text" placeholder="نام خانوادگی" wire:model.defer="family">
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
                <div>
                    <label>ایمیل
                        <input class="text-field" type="email" placeholder="ایمیل" wire:model.defer="email">
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
                <div>
                    <label>شماره همراه
                        <input class="text-field" type="tel" placeholder="شماره همراه" wire:model.defer="mobile" disabled>
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
				<div>
                    <label>استان مورد نظر
                       <input class="text-field" type="text" placeholder="استان مورد نظر" wire:model.defer="province">
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
				<div>
                    <label>شهر مورد نظر
                       <input class="text-field" type="text" placeholder="شهر مورد نظر" wire:model.defer="city">
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
				<div class="col-span-full">
                    <label>کد پستی
                       <input class="text-field" type="text" placeholder="کد پستی" wire:model.defer="postalCode">
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
				<div class="col-span-full">
                    <label for="address">لطفا آدرس دقیق را وارد کنید
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
                <div class="col-span-full">
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
            </form>
            <div class="grid grid-cols-2 gap-2 mt-4 justify-center bg-primary bg-opacity-10 p-4 rounded-2xl sm:grid-cols-4">
                <div class="text-primary text-center">
                    <i class="icon-lock w-12 h-12 flex items-center justify-center mx-auto text-3xl mb-2"></i>
                    <p class="font-medium leading-5 text-sm">حفظ اطلاعات</p>
                </div>
                <div class="text-primary text-center">
                    <i class="icon-support w-12 h-12 flex items-center justify-center mx-auto text-3xl mb-2"></i>
                    <p class="font-medium leading-5 text-sm">پشتیبانی 24 ساعته</p>
                </div>
                <div class="text-primary text-center">
                    <i class="icon-ticket w-12 h-12 flex items-center justify-center mx-auto text-3xl mb-2"></i>
                    <p class="font-medium leading-5 text-sm">ضمانت پرداخت</p>
                </div>
                <div class="text-primary text-center">
                    <i class="icon-bigclock w-12 h-12 flex items-center justify-center mx-auto text-3xl mb-2"></i>
                    <p class="font-medium leading-5 text-sm">ثبت سفارش فوری</p>
                </div>
            </div>
        </div>
    </div>
    <div class="xl:col-start-9 xl:col-end-13 2xl:col-start-10 xl:row-span-full">
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 relative mt-2">
                    <img class="w-16 h-16 absolute inset-0 top-auto" src="<?php echo e(asset('site/svg/avatar.svg')); ?>" alt="آواتار">
                </div>
                <p class="font-bold text-lg capitalize"><?php echo e(auth()->user()->username); ?></p>
            </div>
            <hr class="border-gray-200 my-4">
            <ul class="grid gap-2 text-sm">
                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="flex items-center justify-between gap-4">
                        <div class="flex items-center gap-4">
                            <img class="rounded-xl w-14" src="<?php echo e(asset($item->image)); ?>" alt="">
                            <p class="font-semibold"><?php echo e($item->title); ?></p>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <hr class="border-gray-200 my-4">
            <h2 class="font-semibold text-gray-500 mb-2">جمع کل سبد خرید</h2>

            <div class="bg-gray-50 rounded-xl mt-2 text-sm">
                <div class="flex items-center justify-between p-2">
                    <p>جمع جزء</p>
                    <div class="flex items-center gap-1">
                        <p class="font-semibold"><?php echo e(number_format(Cart::price())); ?></p>
                        <p>تومان</p>
                    </div>
                </div>
                <div class="flex items-center justify-between p-2">
                    <p>تخفیف</p>
                    <div class="flex items-center gap-1">
                        <p class="font-semibold"><?php echo e(number_format(Cart::discount())); ?></p>
                        <p>تومان</p>
                    </div>
                </div>
                <?php if($useVoucher): ?>
                    <div class="flex items-center justify-between p-2">
                        <p>کد تخفیف</p>
                        <div class="flex items-center gap-1">
                            <p class="font-semibold"><?php echo e(number_format($voucherAmountShow)); ?></p>
                            <p>تومان</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($useWallet): ?>
                    <div class="flex items-center justify-between p-2">
                        <p>کیف پول</p>
                        <div class="flex items-center gap-1">
                            <p class="font-semibold"><?php echo e(number_format($walletAmountShow)); ?></p>
                            <p>تومان</p>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="flex items-center justify-between p-2 border-t border-gray-200">
                    <p>جمع کل</p>
                    <div class="flex items-center gap-1">
                        <p class="font-semibold"><?php echo e(number_format(Cart::total($walletAmountShow, $voucherAmountShow))); ?></p>
                        <p>تومان</p>
                    </div>
                </div>
            </div>

            <div class="checkbox checkbox--primary mt-4">
                <input id="useWallet" type="checkbox" class="checkbox__field" wire:model="useWallet">
                <label for="useWallet" class="checkbox__label text-sm">استفاده از کیف پول</label>
            </div>

            <div class="relative mt-4">
                <label>
                    <input class="text-field text-sm" type="text" placeholder="کد تخفیف" wire:model.defer="voucherCode">
                </label>
                <button class="btn btn-primary absolute top-0 bottom-0 left-0 text-sm"
                        wire:loading.attr="disabled" wire:click="checkVoucherCode">تخفیف بده</button>
            </div>
            <?php if($useVoucher): ?>
                <div class="bg-light-green font-medium flex items-center justify-center gap-2 p-2 rounded-2xl mb-2">
                    <i class="icon-check-square"></i>
                    <p class="text-sm">کد با موفقیت اعمال شد</p>
                </div>
            <?php endif; ?>
            <?php $__errorArgs = ['voucher'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="bg-pink font-medium flex items-center justify-center gap-2 p-2 rounded-2xl mb-2">
                <i class="icon-exclamation-square"></i>
                <p class="text-sm"><?php echo e($message); ?></p>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <label class="bg-gray-50 rounded-xl mt-4 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200" for="zarinpal">
                <input id="zarinpal" type="radio" name="gateway" value="zarinpal" wire:model="gateway">
                <img class="rounded-xl w-16" src="<?php echo e(asset('site/images/zarinpal-sm.png')); ?>" alt="">
                <div class="grid">
                    <p class="font-semibold">زرین ‌پال</p>
                    <p class="text-xs font-medium">پرداخت به وسیله کلیه کارت های عضو شبکه شتاب</p>
                </div>
            </label>
			<label class="bg-gray-50 rounded-xl mt-4 mb-2 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200" for="payir">
                <input id="payir" type="radio" name="gateway" value="payir" wire:model="gateway">
                <img class="rounded-xl w-16" src="<?php echo e(asset('site/images/payir.png')); ?>" alt="">
                <div class="grid">
                    <p class="font-semibold">پِی</p>
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
                <p class="text-sm"><?php echo $message; ?></p>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <button class="btn form-submit btn-primary btn-2xl w-full mt-2" wire:click="payment"
                    wire:loading.attr="disabled">ادامه تسویه حساب</button>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/carts/cart-payment-component.blade.php ENDPATH**/ ?>