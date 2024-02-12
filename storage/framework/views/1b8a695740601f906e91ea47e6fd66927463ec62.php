<form class="form-submit-disable" wire:submit.prevent="addToCart()">
    <?php echo $__env->make('site.components.products.form-builder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="flex items-center gap-2">
        <label for="quantity">تعداد</label>
        <div class="relative">
            <input id="quantity" class="text-field w-20" type="number" min="1" wire:model="quantity">
            <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-red"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <?php if($priceWithDiscount == 0): ?>
        <div class="price-form-product flex-box flex-column flex-aling-left">
            <span>قیمت متغییر</span>
        </div>
    <?php else: ?>
        <?php if($product->is_active_discount): ?>
            <div class="price-form-product flex-box flex-column flex-aling-left">
                <span><?php echo e(number_format($priceWithDiscount)); ?></span>

                <span>تومان</span>

                <div class="flex">
                    <p class="line-through text-gray2-700 flex items-center justify-end ml-2">
                        <?php echo e(number_format($price)); ?></p>
                    <div class="bg-red text-white rounded-full py-0.5 px-2 text-xs flex items-center width-auto">
                        <?php echo e($product->discount_percentage); ?>%</div>
                </div>
            </div>
        <?php else: ?>
            <div class="price-form-product flex-box flex-column flex-aling-left">
                <span><?php echo e(number_format($priceWithDiscount)); ?></span>

                <span>تومان</span>
            </div>
        <?php endif; ?>
    <?php endif; ?>


    <div>
        <?php if(
            $product->status == \App\Models\Product::STATUS_AVAILABLE ||
                $product->status == \App\Models\Product::STATUS_TOWARDS_THE_END): ?>
            <button class="input-submit-style" type="submit" wire:loading.attr="disabled">افزودن به سبد خرید</button>
        <?php elseif($product->status == \App\Models\Product::STATUS_COMING_SOON): ?>
            <input class="input-submit-style" type="submit" disabled wire:loading.attr="disabled"
                value="<?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?>">
        <?php elseif($product->status == \App\Models\Product::STATUS_UNAVAILABLE): ?>
            <input class="input-submit-style" type="submit" disabled wire:loading.attr="disabled"
                value="<?php echo e(\App\Models\Product::getProductsStatus()[$product->status]); ?>">
        <?php endif; ?>
    </div>
    <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</form>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/products/form.blade.php ENDPATH**/ ?>