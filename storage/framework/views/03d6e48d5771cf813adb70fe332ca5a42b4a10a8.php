<div>
    <section>
        <div class="flex flex-wrap items-center gap-4 mb-8">

            <div class="select-box" x-data="{ open: false , category: 'همه' }" x-bind:class="{ 'open': open }">
                <div class="select-box__head" @click="open = true">
                    <div class="select-box__head-content">
                        <div class="flex gap-2 items-center max-w-48 overflow-hidden">
                            <i class="select-field__icon icon-product"></i>
                            <span class="select-box__title" x-text="category"></span>
                        </div>
                        <i class="icon-angle-down"></i>
                    </div>
                </div>
                <ul class="select-box__options-list" @click="open = false" @click.away="open = false">
                    <li value="0" class="select-box__option" x-on:click="category = 'همه';$wire.set('category', 0)"><strong>همه</strong></li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li value="<?php echo e($item->id); ?>" class="select-box__option"
                            x-on:click="category = '<?php echo e($item->title); ?>';$wire.set('category', <?php echo e($item->id); ?>)"><strong><?php echo e($item->title); ?></strong></li>
                        <?php $__currentLoopData = $item->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li value="<?php echo e($subCategory->id); ?>" class="select-box__option"
                                x-on:click="category = '<?php echo e($subCategory->title); ?>';$wire.set('category', <?php echo e($subCategory->id); ?>)"><?php echo e($subCategory->title); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <div class="select-box" x-data="{ open: false , sort: 'جدید ترین' }" x-bind:class="{ 'open': open }">
                <div class="select-box__head" @click="open = true">
                    <div class="select-box__head-content">
                        <div class="flex gap-2 items-center max-w-48 overflow-hidden">
                            <i class="select-field__icon icon-filter"></i>
                            <span class="select-box__title" x-text="sort">جدید ترین</span>
                        </div>
                        <i class="icon-angle-down"></i>
                    </div>
                </div>
                <ul class="select-box__options-list" @click="open = false" @click.away="open = false">
                    <?php $__currentLoopData = $sortable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li value="<?php echo e($key); ?>" class="select-box__option" x-on:click="sort = '<?php echo e($value); ?>';$wire.set('sort', '<?php echo e($key); ?>')"><?php echo e($value); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

        
        <div class="grid gap-4 grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 relative">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('site.components.products.product-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo $link; ?>

    </section>

    <section class="grid gap-4 mt-4 sm:grid-cols-2 xl:grid-cols-4">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/products/products-component.blade.php ENDPATH**/ ?>