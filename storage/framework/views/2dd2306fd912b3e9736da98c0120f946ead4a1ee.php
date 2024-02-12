<div class="width-max">
    <div class="header-detalist-product">
        <span><?php echo e($product->title); ?></span>

        <div class="box-point-header-detalist-product flex-box flex-right">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.rating-star','data' => ['rating' => $avg]]); ?>
<?php $component->withName('site.rating-star'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($avg)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if($avg > 0): ?>
                <span class="text-sm">(از <?php echo e($commentsCount); ?> کاربر)</span>
            <?php endif; ?>

            <?php if($start_lottery): ?>
                <li>
                    <i class="rating-stars__filled-star icon-star-filled mr-1"></i>
                    <span class="mr-1">شما با خرید این محصول <strong><?php echo e($product->lottery); ?></strong> شانس دریافت
                        میکنید</span>
                </li>
            <?php endif; ?>
        </div>

        <div>
            <span>شما با خرید این محصول <strong><?php echo e($product->score); ?></strong> امتیاز دریافت میکنید</span>
        </div>
    </div>

    <?php if($product->quantity > 0): ?>
        <div class="remaining-header-detalist-product">
            <span>تنها <?php echo e($product->quantity); ?> عدد در انبار باقی مانده</span>
        </div>
    <?php endif; ?>

    <div class="description-header-detalist-product">
        <ul dir="rtl">
            <?php if($detail_display == 0): ?>
                <li><?php echo $product->short_description; ?></li>
            <?php elseif($detail_display == 1): ?>
                <ul dir="rtl">
                    <?php $__currentLoopData = $parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty(@$item->name)): ?>
                            <li>
                                <p>
                                    <span style="font-size:14px">
                                        <strong>-</strong>
                                        <?php echo e(@$item->name); ?> : <?php echo e(@$parametersValue[$key]); ?>

                                    </span>
                                </p>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php elseif($detail_display == 2): ?>
                <li><?php echo $product->short_description; ?></li>
                <ul dir="rtl">
                    <?php $__currentLoopData = $parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(!empty(@$item->name)): ?>
                            <li>
                                <p>
                                    <span style="font-size:14px">
                                        <strong>-</strong>
                                        <?php echo e(@$item->name); ?> : <?php echo e(@$parametersValue[$key]); ?>

                                    </span>
                                </p>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </ul>
    </div>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/products/info.blade.php ENDPATH**/ ?>