<div class="single-product-image-gallery">

    <div class="swiper-container single-product-image-gallery__big-image group cursor-grab">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->title); ?>"></div>
            <?php if($product->media): ?>
                <?php $__currentLoopData = explode(',', $product->media); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide"><img src="<?php echo e(asset($item)); ?>" alt="<?php echo e($product->title); ?>"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <p class="absolute bottom-0 p-2 z-1 bg-gray-900 bg-opacity-80 text-gray-200 w-full text-center text-sm opacity-0 group-hover:opacity-100 transition duration-200 ease-in-out">
            از راست به چپ یا چپ به راست بکشید</p>
    </div>

    <div class="swiper-container single-product-image-gallery__thumb-images">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img class="cursor-pointer" src="<?php echo e(asset($product->image)); ?>" alt="<?php echo e($product->title); ?>"></div>
            <?php if($product->media): ?>
                <?php $__currentLoopData = explode(',', $product->media); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide"><img class="cursor-pointer" src="<?php echo e(asset($item)); ?>" alt="<?php echo e($product->title); ?>"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/products/image-gallery.blade.php ENDPATH**/ ?>