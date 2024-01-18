<section id="slider-main-home">
    <div class="swiper mySwiper-main-home">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $headerSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide swiper-slide-main-home">
                    <a href="<?php echo e($item['url']); ?>" class="w-full">
                        <img src="<?php echo e(asset($item['image'])); ?>" alt="">
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-button-next swiper-button-next-home"></div>
        <div class="swiper-button-prev swiper-button-prev-home"></div>
        <div class="swiper-pagination swiper-pagination-home"></div>
    </div>
</section>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/homes/slider.blade.php ENDPATH**/ ?>