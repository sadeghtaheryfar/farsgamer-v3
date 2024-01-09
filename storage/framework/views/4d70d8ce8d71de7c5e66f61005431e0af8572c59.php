<?php if(count($giftCards) > 0): ?>
    <section class="mt-10 bg-white rounded-2xl pt-6 px-10 pb-10">
        <div class="flex items-center justify-between mb-4 lg:mb-6">
            <div class="flex gap-2 items-center">
                <h2 class="font-bold text-lg">گیفت کارت</h2>
            </div>
            <a class="flex gap-2 items-center" href="<?php echo e(route('products')); ?>">
                <span class="text-sm lg:text-base">مشاهده همه</span>
                <i class="icon-angle-left text-xl"></i>
            </a>
        </div>
        <div class="grid gap-4 grid-cols-2 2xs:grid-cols-3 sm:grid-cols-4 2md:grid-cols-5 lg:grid-cols-6">
            <?php $__currentLoopData = $giftCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="overflow-hidden bg-white flex rounded-2xl" href="<?php echo e($item['url']); ?>">
                    <img class="w-full" src="<?php echo e(asset($item['image'])); ?>" alt="">
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
<?php endif; ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/gift-cards.blade.php ENDPATH**/ ?>