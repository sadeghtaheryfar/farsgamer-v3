<section class="basic-image-slider swiper-container rounded-2xl overflow-hidden lg:-mt-4">
<div class="swiper-wrapper">
        <?php $__currentLoopData = $headerSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide rounded-2xl overflow-hidden">
                <a href="<?php echo e($item['url']); ?>">
                    <img src="<?php echo e(asset($item['image'])); ?>" alt="">
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="swiper-pagination"></div>
</section><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/homes/slider.blade.php ENDPATH**/ ?>