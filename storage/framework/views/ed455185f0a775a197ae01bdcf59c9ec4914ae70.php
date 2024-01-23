<section class="margin-vetical-2 section-home">
    <div>
        <div id="box-header-best-sellers">
            <div class="swiper mySwiper-main-best-sellers">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide-best-sellers">
                        <div class="item-best-sellers width-max">
                            <div class="header-item-best-sellers width-max flex-box flex-justify-space">
                                <span>پر فروش ها</span>

                                <a class="link-header-best-sellers" href="<?php echo e(route('products')); ?>">
                                    <span>مشاهده بیشتر</span>
                                </a>
                            </div>

                            <div class="message-item-best-sellers width-max">
                                <?php $__currentLoopData = $BestSellersNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('products.show', $specialDiscountOne->slug)); ?>">
                                        <div class="item-message-item-best-sellers flex-box flex-justify-space">
                                            <div class="img-item-message-sellers">
                                                <img src="<?php echo e(asset($product->image)); ?>" alt="">
                                            </div>

                                            <div
                                                class="text-item-message-sellers width-max flex-box flex-right flex-column">
                                                <div class="header-item-message-sellers">
                                                    <?php echo e($product->title); ?>

                                                </div>

                                                <?php if($product->price_with_discount == 0): ?>
                                                    <div class="price-item-message-sellers">
                                                        <span>قیمت متغییر</span>
                                                    </div>
                                                <?php else: ?>
                                                    <?php if($product->is_active_discount): ?>
                                                        <div class="price-off-item-message-sellers flex-box">
                                                            <span><?php echo e($product->discount_percentage); ?>%</span>

                                                            <div class="box-price-item-message-sellers">
                                                                <span><?php echo e(number_format($product->price)); ?></span>
                                                                <span>تومان</span>
                                                            </div>
                                                        </div>

                                                        <div class="price-item-message-sellers">
                                                            <span><?php echo e(number_format($product->price_with_discount)); ?></span>
                                                            <span>تومان</span>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="price-item-message-sellers">
                                                            <span><?php echo e(number_format($product->price)); ?></span>
                                                            <span>تومان</span>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-best-sellers">
                        <div class="item-best-sellers width-max swiper-slide-best-sellers-center">
                            <div class="header-item-best-sellers width-max flex-box flex-justify-space">
                                <span>تخفیفات ویژه</span>

                                <a class="link-header-best-sellers" href="<?php echo e(route('products')); ?>">
                                    <span>مشاهده بیشتر</span>
                                </a>
                            </div>

                            <div class="message-item-best-sellers width-max">
                                <?php $__currentLoopData = $SpecialDiscountsNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('products.show', $specialDiscountOne->slug)); ?>">
                                        <div class="item-message-item-best-sellers flex-box flex-justify-space">
                                            <div class="img-item-message-sellers">
                                                <img src="<?php echo e(asset($product->image)); ?>" alt="">
                                            </div>

                                            <div
                                                class="text-item-message-sellers width-max flex-box flex-right flex-column">
                                                <div class="header-item-message-sellers">
                                                    <?php echo e($product->title); ?>

                                                </div>

                                                <?php if($product->price_with_discount == 0): ?>
                                                    <div class="price-item-message-sellers">
                                                        <span>قیمت متغییر</span>
                                                    </div>
                                                <?php else: ?>
                                                    <?php if($product->is_active_discount): ?>
                                                        <div class="price-off-item-message-sellers flex-box">
                                                            <span><?php echo e($product->discount_percentage); ?>%</span>

                                                            <div class="box-price-item-message-sellers">
                                                                <span><?php echo e(number_format($product->price)); ?></span>
                                                                <span>تومان</span>
                                                            </div>
                                                        </div>

                                                        <div class="price-item-message-sellers">
                                                            <span><?php echo e(number_format($product->price_with_discount)); ?></span>
                                                            <span>تومان</span>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="price-item-message-sellers">
                                                            <span><?php echo e(number_format($product->price)); ?></span>
                                                            <span>تومان</span>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-best-sellers">
                        <div class="item-best-sellers width-max">
                            <div class="header-item-best-sellers width-max flex-box flex-justify-space">
                                <span>گیفت کارت ها</span>

                                <a class="link-header-best-sellers" href="<?php echo e(route('products')); ?>">
                                    <span>مشاهده بیشتر</span>
                                </a>
                            </div>

                            <div class="message-item-best-sellers width-max">
                                <?php $__currentLoopData = $GiftCardsNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('products.show', $specialDiscountOne->slug)); ?>">
                                        <div class="item-message-item-best-sellers flex-box flex-justify-space">
                                            <div class="img-item-message-sellers">
                                                <img src="<?php echo e(asset($product->image)); ?>" alt="">
                                            </div>

                                            <div
                                                class="text-item-message-sellers width-max flex-box flex-right flex-column">
                                                <div class="header-item-message-sellers">
                                                    <?php echo e($product->title); ?>

                                                </div>

                                                <?php if($product->price_with_discount == 0): ?>
                                                    <div class="price-item-message-sellers">
                                                        <span>قیمت متغییر</span>
                                                    </div>
                                                <?php else: ?>
                                                    <?php if($product->is_active_discount): ?>
                                                        <div class="price-off-item-message-sellers flex-box">
                                                            <span><?php echo e($product->discount_percentage); ?>%</span>

                                                            <div class="box-price-item-message-sellers">
                                                                <span><?php echo e(number_format($product->price)); ?></span>
                                                                <span>تومان</span>
                                                            </div>
                                                        </div>

                                                        <div class="price-item-message-sellers">
                                                            <span><?php echo e(number_format($product->price_with_discount)); ?></span>
                                                            <span>تومان</span>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="price-item-message-sellers">
                                                            <span><?php echo e(number_format($product->price)); ?></span>
                                                            <span>تومان</span>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-pagination swiper-pagination-best-sellers flex-box"></div>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/homes/special-discount.blade.php ENDPATH**/ ?>