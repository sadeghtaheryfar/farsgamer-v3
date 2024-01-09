<div>
    <section class="relative p-4 xs:p-6 lg:p-8 lg:py-12 lg:pr-24 lg:pl-20 bg-white rounded-2xl text-gray-600 font-medium overflow-hidden">

        <img class="hidden lg:block absolute top-16 right-6 w-12" src="<?php echo e(asset('site/svg/circle-grid-long.svg')); ?>" alt="">
        <img class="hidden lg:block absolute bottom-14 left-6 w-10" src="<?php echo e(asset('site/svg/circle-grid-medium.svg')); ?>" alt="">
        <img class="hidden lg:block absolute -top-36 -left-28 max-w-64 lg:max-w-lg opacity-30" src="<?php echo e(asset('site/svg/circle-in-circle.svg')); ?>" alt="">
        <img class="hidden lg:block absolute -bottom-28 -right-32 max-w-64 lg:max-w-md opacity-30" src="<?php echo e(asset('site/svg/circle-in-circle-2.svg')); ?>" alt="">


        <div class="relative grid gap-4 overflow-hidden lg:gap-8">
            <div class="grid gap-4 bg-white rounded-2xl overflow-hidden sm:grid-cols-2 md:order-2 xl:grid-cols-3 xl:gap-x-12">
                <div class="grid p-3 bg-primary bg-opacity-10 rounded-2xl sm:col-span-full xl:col-span-1">
                    <div class="p-4 bg-primary rounded-2xl text-white justify-center items-center grid max-h-24">
                        <i class="icon-location flex items-center justify-center text-3xl"></i>
                        <p>آدرس</p>
                    </div>
                    <p class="px-4 pt-3 pb-2 text-center h-full flex items-center justify-center text-sm"><?php echo e($address); ?></p>
                </div>
                <div class="grid p-3 bg-primary bg-opacity-10 rounded-2xl sm:col-start-1 sm:col-end-2 xl:col-span-1">
                    <div class="p-4 bg-primary rounded-2xl text-white justify-center items-center grid max-h-24">
                        <i class="icon-mail flex items-center justify-center text-3xl"></i>
                        <p>ایمیل</p>
                    </div>
                    <p class="px-4 pt-3 pb-2 text-center h-full flex items-center justify-center"><?php echo e($email); ?></p>
                </div>
                <div div class="grid p-3 bg-primary bg-opacity-10 rounded-2xl sm:col-start-2 sm:col-end-3 xl:col-span-1">
                    <div class="p-4 bg-primary rounded-2xl text-white justify-center items-center grid max-h-24">
                        <i class="icon-phone flex items-center justify-center text-3xl"></i>
                        <p>تلفن تماس</p>
                    </div>
                    <p class="px-4 pt-3 pb-2 text-center h-full flex items-center justify-center"><?php echo e($phone); ?></p>
                </div>
            </div>

            <div class="grid gap-4 md:order-1 xl:grid-cols-12 xl:gap-6">
                <div class="pb-8 xl:col-start-1 xl:col-end-6">
                    <div class="basic-image-slider swiper-container rounded-2xl bg-white overflow-hidden relative">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide w-full">
                                    <img class="rounded-2xl" src="<?php echo e(asset($slide)); ?>" alt="">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="swiper-pagination bottom-0"></div>
                    </div>
                </div>
                <div class="xl:p-2 xl:col-start-6 xl:col-end-13 leading-7"><?php echo $description; ?></div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/settings/contact-us-component.blade.php ENDPATH**/ ?>