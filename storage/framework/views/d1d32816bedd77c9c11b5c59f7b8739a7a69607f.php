<section id="main-cart" class="flex-box flex-justify-space">
    <section id="right-cart">
        <div class="show-header-cart-m flex-box">
            <div class="flex-box height-max">
                <div class="item-header-cart-m width-max flex-box">
                    <span>1. سبد خرید</span>
                </div>

                <div class="item-header-cart-m width-max flex-box">
                    <span>2. مشخصات سفارش</span>
                </div>

                <div class="item-header-cart-m item-header-cart-m-active width-max flex-box">
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
                </div>

                <div class="item-header-cart item-header-cart-detalist-active bac-color-blue flex-box">
                    <span>3. جزئیات سفارش</span>
                </div>
            </div>
        </div>

        <?php if($isSuccessful): ?>
            <div class="bg-light-green font-medium flex items-center justify-center gap-2 p-2 rounded-2xl mb-4">
                <i class="icon-check-square"></i>
                <p class="text-sm"><?php echo e($message); ?></p>
            </div>
        <?php else: ?>
            <div
                class="bg-pink font-medium flex flex-wrap items-center justify-center gap-y-2 gap-x-8 p-2 rounded-2xl mb-4">
                <div class="flex items-center gap-2">
                    <i class="icon-exclamation-square"></i>
                    <p class="text-sm"><?php echo e($message); ?></p>
                </div>
                <button class="btn btn-primary btn-outline btn-xs" wire:click="tryAgain"
                    wire:loading.attr="disabled">دوباره تلاش کنید
                </button>
            </div>
        <?php endif; ?>

        <div>
            <?php $__currentLoopData = $data->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-detalist-pay">
                    <div class="flex-box flex-right">
                        <div class="box-img-item-detalist-pay">
                            <img src="<?php echo e(asset($item->product->image)); ?>" alt="">
                        </div>

                        <div class="box-header-item-detalist-pay">
                            <span><?php echo e($item->product->title); ?></span>

                            <ul class="text-sm whitespace-nowrap">
                                <?php $__currentLoopData = $item->form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(($form['type'] ?? '') != 'paragraph'): ?>
                                        <p><?php echo $form['label'] ?? ''; ?></p>
                                        <p class="font-medium"><?php echo e($form['value'] ?? ''); ?></p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>

                    <div class="box-detalist-item-detalist-pay flex-box flex-column flex-aling-left">
                        <?php if($item['licenses'] != ''): ?>
                            <?php $__currentLoopData = $item['licenses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span>کد دیجیتال</span>

                                <div class="copy-text-clipboard license-copy box-number-detalist-item-detalist-pay flex-box">
                                    <div class="flex-box">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16 12.9V17.1C16 20.6 14.6 22 11.1 22H6.9C3.4 22 2 20.6 2 17.1V12.9C2 9.4 3.4 8 6.9 8H11.1C14.6 8 16 9.4 16 12.9Z"
                                                fill="white" />
                                            <path
                                                d="M17.0998 2H12.8998C9.81668 2 8.37074 3.09409 8.06951 5.73901C8.00649 6.29235 8.46476 6.75 9.02167 6.75H11.0998C15.2998 6.75 17.2498 8.7 17.2498 12.9V14.9781C17.2498 15.535 17.7074 15.9933 18.2608 15.9303C20.9057 15.629 21.9998 14.1831 21.9998 11.1V6.9C21.9998 3.4 20.5998 2 17.0998 2Z"
                                                fill="white" />
                                        </svg>
                                    </div>

                                    <div class="flex-box cursor-pointer license">
                                        <span class="item-text-clipboard"><?php echo e($license); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <div class="flex-box amount">
                            <span><?php echo e(number_format($item['price'])); ?></span>

                            <span>تومان</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <section id="left-cart">
        <div class="flex-box flex-right box-user-cart">
            <div class="w-12 h-12 relative mt-2 ml-2">
                <img class="w-16 h-16 absolute inset-0 top-auto" src="<?php echo e(asset('site/svg/avatar.svg')); ?>"
                    alt="avatar">
            </div>
            <p class="font-bold text-lg capitalize"><?php echo e(auth()->user()->username); ?></p>
        </div>

        <div class="box-time-detalist flex-box flex-column">
            <span>زمان باقی مانده</span>

            <div class="width-max">
                <div class="number-time-detalist-pay flex-box">
                    <span id="time-time-detalist-pay" data-countdown="<?php echo e($data->delivery_time); ?>"></span>
                </div>
            </div>
        </div>

        <div class="box-detalist-user-pay">
            <div class="item-detalist-user-pay flex-box flex-justify-space">
                <span>کد سفارش : </span>

                <span dir="ltr">#<?php echo e($data->tracking_code); ?></span>
            </div>

            <div class="item-detalist-user-pay flex-box flex-justify-space">
                <span>تاریخ :</span>

                <span><?php echo e(jalaliDate($data->created_at, '%d %B %Y')); ?></span>
            </div>

            <div class="item-detalist-user-pay flex-box flex-justify-space">
                <span>موبایل : </span>

                <span><?php echo e($data->mobile); ?></span>
            </div>

            <div class="item-detalist-user-pay flex-box flex-justify-space">
                <span>ایمیل : </span>

                <span><?php echo e($data->email); ?></span>
            </div>
        </div>

        <div class="box-register-comment-detalist flex-box flex-column">
            <span>با ثبت نظر از ما هدیه بگیرید</span>

            <a class="input-submit-style flex-box" href="<?php echo e(route('dashboard.comments')); ?>">ثبت نظر</a>
        </div>
    </section>
</section>

<?php $__env->startPush('scripts'); ?>
    <script>
        $('[data-countdown]').each(function() {
            var $this = $(this),
                finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function(event) {
                $this.html(event.strftime('%H:%M:%S'));
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<div id="toast-copy">
    <div id="show-toast-copy" class="flex-box height-max">
        <span>متن با موفقیت کپی شد .</span>

        <div id="time-toast-copy"></div>
    </div>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/carts/cart-checkout-component.blade.php ENDPATH**/ ?>