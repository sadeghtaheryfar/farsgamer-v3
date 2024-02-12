<div id="header-main-search" class="flex-box flex-justify-space">
    <div class="item-header-main-search flex-box flex-justify-space">
        <div class="text-filter-search">
            <span>فیلتر ها</span>
        </div>

        <button class="btn-delete-filter-search">
            <span>حذف فیلتر ها</span>
        </button>
    </div>

    <div class="item-header-main-search flex-box flex-right">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 7H21" stroke="#374151" stroke-width="1.5" stroke-linecap="round" />
            <path d="M6 12H18" stroke="#374151" stroke-width="1.5" stroke-linecap="round" />
            <path d="M10 17H14" stroke="#374151" stroke-width="1.5" stroke-linecap="round" />
        </svg>

        <div class="margin-horizontal-1">
            <span>مرتب سازی : </span>
        </div>

        <div>
            <ul class="flex-box">
                <?php $__currentLoopData = $sortable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li value="<?php echo e($key); ?>"
                        class="margin-horizontal-1 item-filter-header-search select-box__option"
                        x-on:click="sort = '<?php echo e($value); ?>';$wire.set('sort', '<?php echo e($key); ?>')">
                        <?php echo e($value); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
    </div>
</div>

<div id="main-search" class="flex-box flex-justify-space margin-vetical-1">
    <div class="item-message-main-search">
        <div>
            <div class="item-header-mobile open-box-category">
                <span>دسته بندی ها</span>

                <div>
                    <button class="btn-delete-filter-search-mo margin-horizontal-1">حذف فیلتر</button>

                    <svg class="icon-header-store-mbile icon-category-header-store" width="9" height="18"
                        viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <div class="hide-item message-header-sore message-category-store-mobile">
                <form>
                    <div class="box-readio-box-filter flex-box flex-right">
                        <div class="flex-box">
                            <input type="radio" id="radio1" class="radio1 select-price-carts" name="fav_language">
                        </div>

                        <label for="radio1" class="txt-radio-box flex-box flex-justify-space margin-horizontal-1">
                            <div>
                                <div class="flex-box">
                                    <span>فیلتر ها</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <div class="item-header-mobile open-box-category">
                <span>فیلتر ها</span>

                <div>
                    <svg class="icon-header-store-mbile icon-category-header-store" width="9" height="18"
                        viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <div class="hide-item message-header-sore message-category-store-mobile">
                <form>
                    <div class="box-readio-box-filter flex-box flex-right">
                        <div class="flex-box">
                            <input type="radio" id="radio4" class="radio1 select-price-carts" name="fav_language">
                        </div>

                        <label for="radio4" class="txt-radio-box flex-box flex-justify-space margin-horizontal-1">
                            <div>
                                <div class="flex-box">
                                    <span>فیلتر ها</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </form>
            </div>
        </div>

        <div>
            <div class="item-header-mobile open-box-category">
                <span>قیمت</span>

                <div>
                    <svg class="icon-header-store-mbile icon-category-header-store" width="9" height="18"
                        viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                            stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </div>

            <div class="message-header-sore message-category-store-mobile">
                <div class="wrapper" dir="ltr">
                    <div class="box-price-input">
                        <div class="price-input">
                            <span class="txt2-box-price">از</span>
                            <h2 class="input-min massage-box-price">0</h2>
                            <span class="txt1-box-price">تومان</span>
                        </div>

                        <div class="price-input">
                            <span class="txt2-box-price">از</span>
                            <h2 class="input-max massage-box-price">10000</h2>
                            <span class="txt1-box-price">تومان</span>
                        </div>
                    </div>

                    <div class="slider">
                        <div class="progress"></div>
                    </div>

                    <div class="range-input" dir="lte">
                        <input type="range" class="range-min" min="0" max="10000" value="0"
                            step="100">
                        <input type="range" class="range-max" min="0" max="10000" value="10000"
                            step="100">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-box flex-justify-space margin-vetical-1">
            <div>
                <span>کالاهای موجود</span>
            </div>

            <div>
                <div class="toggle-btn flex-box">
                    <div class="box-true-btn-toggle">
                        <div class="true-btn-toggle flex-box hide-item">
                            <svg width="12" height="9" viewBox="0 0 12 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 1L4 7.5L1 5" stroke="white" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>

                    <div class="box-false-btn-toggle">
                        <div class="false-btn-toggle flex-box">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.5 1L1 9.5M9.5 9.5L1 1" stroke="black" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="left-message-main-search flex-box flex-wrap flex-right">
        <div class="grid gap-4 grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 relative">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('site.components.products.product-box', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <?php echo $link; ?>

</div>

<section class="grid gap-4 mt-4 sm:grid-cols-2">
    <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg"
                src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>

<div>
    <section>
        <div class="flex flex-wrap items-center gap-4 mb-8">

            <div class="select-box" x-data="{ open: false, category: 'همه' }" x-bind:class="{ 'open': open }">
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
                    <li value="0" class="select-box__option"
                        x-on:click="category = 'همه';$wire.set('category', 'all')"><strong>همه</strong></li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li value="<?php echo e($item->id); ?>" class="select-box__option"
                            x-on:click="category = '<?php echo e($item->title); ?>';$wire.set('category', '<?php echo e($item->slug); ?>')">
                            <strong><?php echo e($item->title); ?></strong>
                        </li>
                        <?php $__currentLoopData = $item->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li value="<?php echo e($subCategory->id); ?>" class="select-box__option"
                                x-on:click="category = '<?php echo e($subCategory->title); ?>';$wire.set('category', '<?php echo e($subCategory->slug); ?>')">
                                <?php echo e($subCategory->title); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            
            <div class="select-box" x-data="{ open: false, sort: 'جدید ترین' }" x-bind:class="{ 'open': open }">
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
                        <li value="<?php echo e($key); ?>" class="select-box__option"
                            x-on:click="sort = '<?php echo e($value); ?>';$wire.set('sort', '<?php echo e($key); ?>')">
                            <?php echo e($value); ?></li>
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

    <section class="grid gap-4 mt-4 sm:grid-cols-2">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg"
                    src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/products/products-component.blade.php ENDPATH**/ ?>