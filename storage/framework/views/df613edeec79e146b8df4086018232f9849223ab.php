<section id="main-cart" class="flex-box flex-justify-space">
    <section id="right-cart">
        <div class="show-header-cart-m flex-box">
            <div class="flex-box height-max">
                <div id="cart-main" class="item-header-cart-m width-max flex-box">
                    <span>1. سبد خرید</span>
                </div>

                <div class="item-header-cart-m item-header-cart-m-active width-max flex-box">
                    <span>2. مشخصات سفارش</span>
                </div>

                <div class="item-header-cart-m width-max flex-box">
                    <span>3. جزئیات سفارش</span>
                </div>
            </div>
        </div>

        <div class="show-header-cart flex-box">
            <div class="header-cart flex-box">
                <div class="item-header-cart item-header-cart-active bac-color-blue flex-box">
                    <span>1. سبد خرید</span>
                </div>

                <div class="item-header-cart item-header-cart-payment-active bac-color-blue flex-box">
                    <span>2. مشخصات سفارش</span>

                    <svg width="10" height="19" viewBox="0 0 10 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.684858 8.80044C0.304292 9.18918 0.304292 9.81082 0.684858 10.1996L8.03542 17.7079C8.66225 18.3482 9.75 17.9044 9.75 17.0084L9.75 1.99165C9.75 1.09561 8.66225 0.651804 8.03542 1.29209L0.684858 8.80044Z"
                            fill="#3D42DF" />
                    </svg>
                </div>

                <div class="item-header-cart flex-box">
                    <span>3. جزئیات سفارش</span>
                </div>
            </div>
        </div>

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
                    <input class="text-field" type="tel" placeholder="شماره همراه" wire:model.defer="mobile"
                        disabled>
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
                        <input class="text-field" type="text" placeholder="استان مورد نظر"
                            wire:model.defer="province">
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
    </section>

    <section id="left-cart">
        <div class="bg-white rounded-2xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 relative mt-2">
                    <img class="w-16 h-16 absolute inset-0 top-auto" src="<?php echo e(asset('site/svg/avatar.svg')); ?>"
                        alt="آواتار">
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

            <div class="box-price-cart margin-vetical-1">
                <div class="flex-box flex-justify-space">
                    <span>جمع جزء</span>

                    <div class="price-box-prices-cart">
                        <span><?php echo e(number_format(Cart::price())); ?></span>

                        <span>تومان</span>
                    </div>
                </div>

                <div class="flex-box flex-justify-space margin-vetical-1">
                    <span>تخفیف</span>

                    <div class="price-box-prices-cart">
                        <span><?php echo e(number_format(Cart::discount())); ?></span>

                        <span>تومان</span>
                    </div>
                </div>

                <?php if($useVoucher): ?>
                    <div class="flex-box flex-justify-space margin-vetical-1">
                        <span>کد تخفیف</span>

                        <div class="price-box-prices-cart">
                            <span><?php echo e(number_format($voucherAmountShow)); ?></span>

                            <span>تومان</span>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($useWallet): ?>
                    <div class="flex-box flex-justify-space margin-vetical-1">
                        <span>کیف پول</span>

                        <div class="price-box-prices-cart">
                            <span><?php echo e(number_format($walletAmountShow)); ?></span>

                            <span>تومان</span>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="box-total-price flex-box flex-justify-space">
                    <span>جمع کل</span>

                    <div class="price-box-prices-cart">
                        <span><?php echo e(number_format(Cart::total($walletAmountShow, $voucherAmountShow))); ?></span>

                        <span>تومان</span>
                    </div>
                </div>
            </div>

            <div class="checkbox checkbox--primary mt-4">
                <input id="useWallet" type="checkbox" class="checkbox__field" wire:model="useWallet">
                <label for="useWallet" class="checkbox__label text-sm">استفاده از کیف پول</label>
            </div>

            <div class="relative mt-4">
                <label>
                    <input class="text-field text-sm" type="text" placeholder="کد تخفیف"
                        wire:model.defer="voucherCode">
                </label>
                <button class="btn-pay-cart btn btn-primary absolute top-0 bottom-0 left-0 text-sm" wire:loading.attr="disabled"
                    wire:click="checkVoucherCode">تخفیف بده</button>
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

            <label
                class="bg-gray-50 rounded-xl mt-4 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                for="zarinpal">
                <input id="zarinpal" type="radio" name="gateway" value="zarinpal" wire:model="gateway">
                <img class="rounded-xl w-16" src="<?php echo e(asset('site/images/zarinpal-sm.png')); ?>" alt="">
                <div class="grid">
                    <p class="font-semibold">زرین ‌پال</p>
                    <p class="text-xs font-medium">پرداخت به وسیله کلیه کارت های عضو شبکه شتاب</p>
                </div>
            </label>

            <label
                class="bg-gray-50 rounded-xl mt-4 mb-2 flex items-center gap-2 p-3 cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                for="payir">
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
    </section>

    <section id="next-page-sticy" class="flex-box flex-justify-space">
        <a>
            <button class="input-submit-style" wire:click="payment" wire:loading.attr="disabled">ادامه</button>
        </a>

        <div>
            <span>جمع کل</span>

            <div>
                <b><?php echo e(number_format(Cart::total())); ?></b>

                <span>تومان</span>
            </div>
        </div>
    </section>
</section>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/carts/cart-payment-component.blade.php ENDPATH**/ ?>