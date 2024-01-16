<?php if(sizeof($products) > 0): ?>
    <section wire:ignore>
        <div class="flex items-center justify-between mb-4 mt-8 lg:mb-6 lg:mt-10">
            <div class="flex gap-2 items-center">
                <?php if($icon != ''): ?>
                <img class="w-6 h-6" src="<?php echo e(asset($icon)); ?>" alt="آتش">
                <?php endif; ?>
                <h2 class="font-bold text-lg"><?php echo e($title); ?></h2>
            </div>
            <a class="flex gap-2 items-center" href="<?php echo e(route('products')); ?>?category=gaming-equipment&sort=latest">
                <span class="text-sm lg:text-base">مشاهده همه</span>
                <i class="icon-angle-left text-xl"></i>
            </a>
        </div>
        <div class="slider-prudect">
            <div class="swiper slider-main-prudect">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <?php echo $__env->make('site.components.products.product-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="swiper-button-next swiper-button-next-prudect"></div>

                <div class="swiper-button-prev swiper-button-prev-prudect"></div>

                <div class="swiper-pagination swiper-pagination-prudect flex-box"></div>
            </div>
        </div>
    </section>
<?php endif; ?><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/homes/gaming-equipment.blade.php ENDPATH**/ ?>