<div class="swiper-slide swiper-slide-prudect-box-new">
    <div class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
        <a class="show-swiper-slide-prudect flex-box flex-column" href="<?php echo e(route('products.show', $product->slug)); ?>">
            <?php if($product->status == \App\Models\Product::STATUS_AVAILABLE): ?>
                <div>
                    <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">
                </div>
            <?php elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE): ?>
                <div class="relative">
                    <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">

                    <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center rounded-xl">
                        <p class="text-white font-medium">
                            <?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?>

                        </p>
                    </div>
                </div>
            <?php elseif($product->status == \App\Models\Product::STATUS_COMING_SOON): ?>
                <div class="relative">
                    <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">

                    <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center rounded-xl">
                        <p class="text-white font-medium">
                            <?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?>

                        </p>
                    </div>
                </div>
            <?php elseif($product->status == \App\Models\Product::STATUS_TOWARDS_THE_END): ?>
                <div class="relative">
                    <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">

                    <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center rounded-xl">
                        <p class="text-white font-medium">
                            <?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?>

                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <div>
                <span><?php echo e($product->title); ?></span>
            </div>

            <?php if($product->price_with_discount == 0): ?>
                <div>
                    <div class="price">
                        <span>قیمت متغییر</span>
                    </div>
                </div>
            <?php else: ?>
                <?php if($product->is_active_discount): ?>
                    <div>
                        <div class="price flex gap-1.5 justify-center">
                            <div class="font-semibold leading-4 grid">
                                
                                <p><?php echo e(number_format($product->price_with_discount)); ?></p>
                                
                                <p class="line-through text-gray2-700 flex items-center justify-end">
                                    <?php echo e(number_format($product->price)); ?></p>
                            </div>

                            <div class="grid gap-1">
                                <p class="text-sm">تومان</p>
                                
                                <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs">
                                    <?php echo e($product->discount_percentage); ?>%</div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div>
                        <div class="price">
                            <span><?php echo e(number_format($product->price_with_discount)); ?></span>

                            <span>تومان</span>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </a>
    </div>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/products/product-box.blade.php ENDPATH**/ ?>