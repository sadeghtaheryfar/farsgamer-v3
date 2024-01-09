<div wire:init="$set('readyToLoad', true)">

    <?php echo e(Breadcrumbs::view('site.components.breadcrumb', 'products.show', $product)); ?>


    <section class="overflow-hidden rounded-2xl bg-white pb-4 lg:pb-12">
        <div class="relative overflow-hidden">
            <img class="w-full" src="<?php echo e(asset($product->category->image ?? '')); ?>" alt="">
            <div class="single-product-poster-overlayer absolute inset-0"></div>
        </div>
        <div class="px-4 max-w-3xl mt-8 mx-auto sm:mt-4 md:mt-0 lg:-mt-16 lg:items-center xl:-mt-20 2xl:-mt-24 2xl:max-w-4xl">
            <div class="grid gap-8 lg:gap-0 xl:flex xl:gap-8" wire:ignore>
                <div>
                    <?php echo $__env->make('site.components.products.image-gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <?php echo $__env->make('site.components.products.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php echo $__env->make('site.components.products.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </section>

    <?php echo $__env->make('site.homes.best-sellers', ['products' => $relatedProducts, 'title' => 'محصولات مرتبط', 'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('site.components.products.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="grid gap-4 mt-4 sm:grid-cols-2 xl:grid-cols-4">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/products/product-component.blade.php ENDPATH**/ ?>