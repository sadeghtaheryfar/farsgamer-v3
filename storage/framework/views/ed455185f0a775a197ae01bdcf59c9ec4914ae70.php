<section class="mt-8">

    <div class="flex items-center justify-between mb-4 mt-8 lg:mb-6 lg:mt-10">
        <div class="flex gap-2 items-center">
            <img class="w-6 h-6" src="<?php echo e(asset('site/svg/fire.svg')); ?>" alt="آتش">
            <h2 class="font-bold text-lg">تخفیفات ویژه</h2>
        </div>
    </div>

    <div class="grid gap-4 md:grid-cols-7 xl:flex">

        <?php if($specialDiscountOne): ?>
            <a href="<?php echo e(route('products.show', $specialDiscountOne->slug)); ?>"
                class="relative flex mb-4 md:col-span-3 md:order-2 md:mb-0 xl:max-w-md">
                <img class="rounded-2xl object-cover" src="<?php echo e(asset($imageSpecialDiscount)); ?>" alt="">
                <time
                    class="w-full absolute bottom-0 inset-x-center flex items-center rounded-2xl justify-center gap-8 pt-24 pb-4 px-4 text-red bg-gradient-to-b from-transparent to-white">
                    <div class="grid text-center">
                        <span class="font-bold text-3xl"
                            data-countdown-seconds="<?php echo e($specialDiscountOne->discount_expires_at ?? '3030-03-03'); ?>"></span>
                        <span class="font-semibold">ثانیه</span>
                    </div>
                    <div class="grid text-center">
                        <span class="font-bold text-3xl"
                            data-countdown-minute="<?php echo e($specialDiscountOne->discount_expires_at ?? '3030-03-03'); ?>"></span>
                        <span class="font-semibold">دقیقه</span>
                    </div>
                    <div class="grid text-center">
                        <span class="font-bold text-3xl"
                            data-countdown-hour="<?php echo e($specialDiscountOne->discount_expires_at ?? '3030-03-03'); ?>"></span>
                        <span class="font-semibold">ساعت</span>
                    </div>
                </time>
            </a>
        <?php endif; ?>

        <div class="grid gap-4 md:col-span-4 md:order-1 xl:w-full 3xl:grid-cols-2">
            <?php if($specialDiscountTwo): ?>
                <div>
                    <a href="<?php echo e(route('products.show', $specialDiscountTwo->slug)); ?>"
                        class="w-full grid gap-4 2xs:row-span-full bg-white p-2 rounded-2xl 2xs:grid-cols-2 2xs:items-center 2xs:justify-between">
                        <img class="justify-self-end rounded-2xl 2xs:col-start-2 2xs:col-end-3 2xs:row-span-full max-w-50 xl2:max-w-64 2xl:max-w-68"
                            src="<?php echo e(asset($specialDiscountTwo->image)); ?>" alt="">

                        <div class="py-2 text-center 2xs:col-start-1 2xs:col-end-2">
                            <span
                                class="inline-block bg-gray2-100 rounded-full py-2 px-3 font-medium text-red text-xs">تخفیف
                                ویژه</span>
                            <h3
                                class="font-semibold my-4 md:text-xl 2xl:text-2xl px-2 flex justify-center overflow-hidden">
                                <?php echo e($specialDiscountTwo->title); ?></h3>

                            <div class="h-14 inline-block mx-auto">
                                <div class="bg-gray-100 py-1 px-6 rounded-xl">
                                    <?php if($specialDiscountTwo->price_with_discount == 0): ?>
                                        <p
                                            class="text-center inline-block gap-0.5 <?php echo e($specialDiscountTwo->is_active_discount ? '' : 'py-2'); ?>">
                                            <span class="text-sm">قیمت متغیر</span>
                                        </p>
                                    <?php else: ?>
                                        <p
                                            class="text-center inline-block gap-0.5 <?php echo e($specialDiscountTwo->is_active_discount ? '' : 'py-2'); ?>">
                                            <span
                                                class="font-semibold"><?php echo e(number_format($specialDiscountTwo->price_with_discount)); ?></span>
                                            <span class="text-sm">تومان</span>
                                        </p>
                                    <?php endif; ?>

                                    <?php if($specialDiscountTwo->is_active_discount): ?>
                                        <div class="flex items-center justify-center gap-2">
                                            
                                            <span
                                                class="font-semibold line-through text-gray2-700"><?php echo e(number_format($specialDiscountTwo->price)); ?></span>
                                            
                                            <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs">
                                                <?php echo e($specialDiscountTwo->discount_percentage); ?>%</div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-4 flex w-full justify-center items-center gap-1">
                                <div data-countdown="<?php echo e($specialDiscountTwo->discount_expires_at ?? '3030-03-03'); ?>">
                                </div>
                                <i class="icon-clock"></i>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if($specialDiscountThree): ?>
                <div>
                    <a href="<?php echo e(route('products.show', $specialDiscountThree->slug)); ?>"
                        class="w-full grid gap-4 2xs:row-span-full bg-white p-2 rounded-2xl 2xs:grid-cols-2 2xs:items-center 2xs:justify-between">
                        <img class="justify-self-end rounded-2xl 2xs:col-start-2 2xs:col-end-3 2xs:row-span-full max-w-50 xl2:max-w-64 2xl:max-w-68"
                            src="<?php echo e(asset($specialDiscountThree->image)); ?>" alt="">

                        <div class="py-2 text-center 2xs:col-start-1 2xs:col-end-2">
                            <span
                                class="inline-block bg-gray2-100 rounded-full py-2 px-3 font-medium text-red text-xs">تخفیف
                                ویژه</span>
                            <h3
                                class="font-semibold my-4 md:text-xl 2xl:text-2xl px-2 flex justify-center overflow-hidden">
                                <?php echo e($specialDiscountThree->title); ?></h3>

                            <div class="h-14 inline-block mx-auto">
                                <div class="bg-gray-100 py-1 px-6 rounded-xl">

                                    <?php if($specialDiscountThree->price_with_discount == 0): ?>
                                        <p
                                            class="text-center inline-block gap-0.5 <?php echo e($specialDiscountThree->is_active_discount ? '' : 'py-2'); ?>">
                                            <span class="text-sm">قیمت متغیر</span>
                                        </p>
                                    <?php else: ?>
                                        <p
                                            class="text-center inline-block gap-0.5 <?php echo e($specialDiscountThree->is_active_discount ? '' : 'py-2'); ?>">
                                            <span
                                                class="font-semibold"><?php echo e(number_format($specialDiscountThree->price_with_discount)); ?></span>
                                            <span class="text-sm">تومان</span>
                                        </p>
                                    <?php endif; ?>

                                    <?php if($specialDiscountThree->is_active_discount): ?>
                                        <div class="flex items-center justify-center gap-2">
                                            
                                            <span
                                                class="font-semibold line-through text-gray2-700"><?php echo e(number_format($specialDiscountThree->price)); ?></span>
                                            
                                            <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs">
                                                <?php echo e($specialDiscountThree->discount_percentage); ?>%</div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="mt-4 flex w-full justify-center items-center gap-1">
                                <div data-countdown="<?php echo e($specialDiscountThree->discount_expires_at ?? '3030-03-03'); ?>">
                                </div>
                                <i class="icon-clock"></i>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/homes/special-discount.blade.php ENDPATH**/ ?>