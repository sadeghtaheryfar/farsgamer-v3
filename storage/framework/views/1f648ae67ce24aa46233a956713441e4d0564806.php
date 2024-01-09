<div class="rounded-xl overflow-hidden bg-white grid justify-center items-end">
    <a href="<?php echo e(route('products.show', $product->slug)); ?>">
        <?php if($product->status == \App\Models\Product::STATUS_AVAILABLE): ?>
            <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">
        <?php elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE): ?>
            <div class="relative overflow-hidden">
                <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">
                <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center">
                    <p class="text-white font-medium"><?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?></p>
                </div>
            </div>
        <?php elseif($product->status == \App\Models\Product::STATUS_COMING_SOON): ?>
            <div class="relative overflow-hidden">
                <img class="w-full" src="<?php echo e(asset($product->image)); ?>" alt="">
                <div class="bg-gray-700 bg-opacity-70 absolute inset-0 flex items-center justify-center">
                    <p class="text-white font-medium"><?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </a>
    <div class="text-center">
        <a href="<?php echo e(route('products.show', $product->slug)); ?>">
            <h3 class="js-truncate-product-title text-center overflow-hidden text-gray-700 pt-3 px-4 font-semibold h-16 leading-5"><?php echo e($product->title); ?></h3>
        </a>
        <p class="text-center text-gray2-700 text-sm mb-0.5 max-h-5 overflow-hidden px-4"><?php echo e($product->category->title ?? ''); ?></p>

        <div class="h-14 inline-block mx-auto">
            <?php if($product->price_with_discount == 0): ?>
                <div class="bg-gray-100 py-1 px-4 rounded-xl xs:px-6">
                    <p class="text-center inline-block py-2 gap-0.5">
                        <span class="text-sm">قیمت متغیر</span>
                    </p>
                </div>
            <?php else: ?>
                <?php if($product->is_active_discount): ?>
                    <div class="h-full flex justify-center items-center min-w-38 text-center bg-gray-100 py-2 px-4 rounded-xl">
                        <div class="flex gap-1.5 justify-center">
                            <div class="font-semibold leading-4 grid">
                                
                                <p><?php echo e(number_format($product->price_with_discount)); ?></p>
                                
                                <p class="line-through text-gray2-700 flex items-center justify-end"><?php echo e(number_format($product->price)); ?></p>
                            </div>

                            <div class="grid gap-1">
                                <p class="text-sm">تومان</p>
                                
                                <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs"><?php echo e($product->discount_percentage); ?>%</div>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="bg-gray-100 py-1 px-4 rounded-xl xs:px-6">
                        <p class="text-center inline-block py-2 gap-0.5">
                            <span class="font-semibold"><?php echo e(number_format($product->price_with_discount)); ?></span>
                            <span class="text-sm">تومان</span>
                        </p>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="flex justify-center border-t border-gray-200 py-3 mt-2">
            <a class="btn btn-primary inline-flex items-center justify-center gap-2 p-2 px-4 bg-new-blue text-white rounded-full"
               href="<?php echo e(route('products.show', $product->slug)); ?>">
                <i class="icon-basket"></i>
                <span class="text-sm">جزئیات محصول</span>
            </a>
        </div>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/products/product-box.blade.php ENDPATH**/ ?>