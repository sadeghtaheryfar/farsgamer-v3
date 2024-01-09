<?php if(count($specialDiscount) > 0): ?>
    <section class="mt-8">

        <div class="flex items-center justify-between mb-4 mt-8 lg:mb-6 lg:mt-10">
            <div class="flex gap-2 items-center">
                <img class="w-6 h-6" src="<?php echo e(asset('site/svg/fire.svg')); ?>" alt="آتش">
                <h2 class="font-bold text-lg">تخفیفات ویژه</h2>
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">

            <?php $__currentLoopData = $specialDiscount; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($loop->iteration == 1): ?>
                    <a href="<?php echo e(route('products.show', $item->slug)); ?>" class="flex mb-4 lg:order-2 relative lg:hidden">
                        <img class="rounded-2xl" src="<?php echo e(asset($imageSpecialDiscount)); ?>" alt="">
                        <time class="w-full absolute bottom-0 inset-x-center flex items-center rounded-2xl justify-center gap-8 pt-24 pb-4 px-4 text-red bg-gradient-to-b from-transparent to-white">
                            <div class="grid text-center">
                                <span class="font-bold text-3xl"
                                      data-countdown-seconds="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></span>
                                <span class="font-semibold">ثانیه</span>
                            </div>
                            <div class="grid text-center">
                                <span class="font-bold text-3xl"
                                      data-countdown-minute="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></span>
                                <span class="font-semibold">دقیقه</span>
                            </div>
                            <div class="grid text-center">
                                <span class="font-bold text-3xl"
                                      data-countdown-hour="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></span>
                                <span class="font-semibold">ساعت</span>
                            </div>
                        </time>
                    </a>
                    <a href="<?php echo e(route('products.show', $item->slug)); ?>"
                       class="hidden mb-4 rounded-2xl w-full h-full bg-cover bg-center leading-none overflow-hidden lg:relative lg:block lg:order-2"
                       style="background-image: url('/images/werwer.png')">
                        <time class="w-full absolute bottom-0 inset-x-center flex items-center rounded-2xl justify-center gap-8 pt-24 pb-4 px-4 text-red bg-gradient-to-b from-transparent to-white">
                            <div class="grid text-center">
                                <span class="font-bold text-3xl"
                                      data-countdown-seconds="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></span>
                                <span class="font-semibold">ثانیه</span>
                            </div>
                            <div class="grid text-center">
                                <span class="font-bold text-3xl"
                                      data-countdown-minute="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></span>
                                <span class="font-semibold">دقیقه</span>
                            </div>
                            <div class="grid text-center">
                                <span class="font-bold text-3xl"
                                      data-countdown-hour="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></span>
                                <span class="font-semibold">ساعت</span>
                            </div>
                        </time>
                    </a>
                    <div class="grid gap-4 lg:order-1">
                        <?php else: ?>
                            <div>
                                <a href="<?php echo e(route('products.show', $item->slug)); ?>"
                                   class="w-full grid gap-4 2xs:row-span-full bg-white p-2 rounded-2xl 2xs:grid-cols-2 2xs:items-center 2xs:justify-between">
                                    <img class="justify-self-end rounded-2xl 2xs:col-start-2 2xs:col-end-3 2xs:row-span-full" src="<?php echo e(asset($item->image)); ?>" alt="">

                                    <div class="py-2 text-center 2xs:col-start-1 2xs:col-end-2">
                                        <span class="bg-gray2-100 rounded-full py-1.5 px-2.5 font-medium text-red mb-4 text-sm">تخفیف ویژه</span>
                                        <h3 class="font-semibold my-4 md:text-xl 2xl:text-2xl px-2 h-14 max-h-14 flex justify-center overflow-hidden"><?php echo e($item->title); ?></h3>

                                        <div class="h-14 inline-block mx-auto">
                                            <div class="bg-gray-100 py-1 px-6 rounded-xl">

                                                <p class="text-center inline-block gap-0.5 <?php echo e($item->is_active_discount ? '' : 'py-2'); ?>">
                                                    <span class="font-semibold"><?php echo e(number_format($item->price_with_discount)); ?></span>
                                                    <span class="text-sm">تومان</span>
                                                </p>

                                                <?php if($item->is_active_discount): ?>
                                                    <div class="flex items-center justify-center gap-2">
                                                        
                                                        <span class="font-semibold line-through text-gray2-700"><?php echo e(number_format($item->price)); ?></span>
                                                        
                                                        <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs"><?php echo e($item->discount_percentage); ?>%</div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="mt-4 flex w-full justify-center items-center gap-1">
                                            <div data-countdown="<?php echo e($item->discount_expires_at ?? '3030-03-03'); ?>"></div>
                                            <i class="icon-clock"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/special-discount.blade.php ENDPATH**/ ?>