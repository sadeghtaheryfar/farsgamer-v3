<div>
    <?php echo e(Breadcrumbs::view('site.components.breadcrumb', 'products.show', $product)); ?>


    <section id="main-product" class="flex-box flex-justify-space flex-aling-auto">
        <section class="right-main-product">
            <div class="box-header-detalist-product flex-box flex-justify-space flex-aling-auto flex-column-1000">
                <?php echo $__env->make('site.components.products.image-gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="margin-horizontal-1"></div>

                <?php echo $__env->make('site.components.products.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <section id="left-main-product-tablet" class="left-main-product">
                <div class="box-form-product">
                    <?php echo $__env->make('site.components.products.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="box-trainings-product">
                    <div class="show-box-trainings-product">
                        <span>آموزش های مورد نیاز</span>

                        <div class="flex-box flex-wrap flex-right">
                            <a href="#" class="item-trainings-product">
                                <span>راهنمای انتخاب نوع اکانت</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span>لینک کردن Ps4 به اپیک گیمز</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span> راهنمای دومرحله ای پلی استیشن</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span>راهنمای انتخاب نوع اکانت</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span>لینک کردن Ps4 به اپیک گیمز</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <?php echo $__env->make('site.components.products.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>

        <section class="left-main-product">
            <div class="box-form-product">
                <?php echo $__env->make('site.components.products.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="box-trainings-product">
                <span>آموزش های مورد نیاز</span>

                <div class="flex-box flex-wrap flex-right">
                    <a href="#" class="item-trainings-product">
                        <span>راهنمای انتخاب نوع اکانت</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span>لینک کردن Ps4 به اپیک گیمز</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span> راهنمای دومرحله ای پلی استیشن</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span>راهنمای انتخاب نوع اکانت</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span>لینک کردن Ps4 به اپیک گیمز</span>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <div class="margin-vetical-2"></div>

    <section class="margin-vetical-2 hide-item-mobile">
        <?php echo $__env->make('site.homes.best-sellers', [
            'products' => $relatedProducts,
            'title' => 'محصولات مرتبط',
            'route' => route('products'),
            'icon' => '',
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <?php echo $__env->make('site.components.products.content-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/products/product-component.blade.php ENDPATH**/ ?>