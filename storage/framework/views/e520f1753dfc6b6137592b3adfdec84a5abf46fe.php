<section id="slider-page-articles">
    <div class="swiper mySwiper-page-articles flex-box">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $LastArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide swiper-slide-page-articles">
                    <div class="box-right-slide-page-articles flex-box flex-column">
                        <div class="flex-box flex-justify-space width-max">
                            <div class="header-slide-page-articles">
                                <span>مقالات اخیر</span>
                            </div>

                            <div class="flex-box flex-column flex-aling-left">
                                <div dir="ltr" class="number-articles-item-slider">
                                    <span>0<?php echo e(++$key); ?></span>

                                    <span>/</span>

                                    <span>05</span>
                                </div>

                                <div class="date-articles-item-slider flex-box flex-right">
                                    <span><?php echo e(jalaliDate($slider->created_at, '%d %B %Y')); ?></span>

                                    <div class="circle-date-articles-item"></div>

                                    <span><?php echo e(!empty($slider->categories->title) ? $slider->categories->title : 'بدون دسته بندی'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="message-header-slide-page-articles">
                            <span><?php echo e($slider->title); ?></span>
                        </div>

                        <div class="message-slide-page-articles">
                            <?php echo $slider->description; ?>

                        </div>

                        <div class="flex-box flex-right width-max" style="margin-top: auto">
                            <a href="<?php echo e(route('articles.show', $slider->slug)); ?>" class="btn-more-page-articles">
                                <span>مطالعه بیشتر</span>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-pagination swiper-pagination-page-articles flex-box"></div>

                    <div class="box-left-slide-page-articles">
                        <img src="<?php echo e(asset($slider->image)); ?>" alt="">
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="swiper-button-next swiper-button-next-page-articles"></div>

        <div class="swiper-button-prev swiper-button-prev-page-articles"></div>

        
    </div>
</section>

<section class="main-style-page">
    <div class="header-page-articles flex-box flex-justify-space">
        <div>
            <span>مقالات</span>
        </div>

        <div class="select-box">
            <div class="header-select-box flex-box flex-justify-space">
                <img src="img/sort.svg" alt="">

                <span id="text-header-select-box"></span>

                <img class="icon-select-box" src="img/arrow-square-up.svg" alt="">
            </div>

            <div class="more-select-box hide-item">
                <ul>
                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 1</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 2</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 3</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 4</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 5</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="box-item-articles-page" class="flex-box flex-wrap flex-right">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-page-articles">
                <a href="<?php echo e(route('articles.show', $article->slug)); ?>">
                    <div class="show-articles-page">
                        <div class="img-show-articles">
                            <img src="<?php echo e(asset($article->image)); ?>" alt="">

                            <div class="box-category-item">
                                <span><?php echo e(!empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی'); ?></span>
                            </div>
                        </div>

                        <div class="date-articles-item flex-box flex-right">
                            <span><?php echo e(jalaliDate($article->created_at, '%d %B %Y')); ?></span>

                            <div class="circle-date-articles-item"></div>

                            <span>مدیریت فارس گیمر</span>
                        </div>

                        <div class="header-articles-item">
                            <span><?php echo e($article->title); ?></span>
                        </div>

                        <div class="detalist-articles-item">
                            <?php echo $article->description; ?>

                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div id="box-item-articles-page-mobile" class="flex-box flex-wrap flex-right">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item-page-articles-mo">
                <a href="<?php echo e(route('articles.show', $article->slug)); ?>">
                    <div class="show-articles-page-mo">
                        <div class="flex-box">
                            <div class="img-show-articles-mo">
                                <img src="<?php echo e(asset($article->image)); ?>" alt="">
                            </div>

                            <div class="width-max">
                                <div class="flex-box flex-justify-space">
                                    <div class="date-articles-item flex-box flex-right">
                                        <span><?php echo e(jalaliDate($article->created_at, '%d %B %Y')); ?></span>

                                        <div class="circle-date-articles-item"></div>

                                        <span>مدیریت فارس گیمر</span>
                                    </div>

                                    <div class="box-category-item-mo">
                                        <span><?php echo e(!empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی'); ?></span>
                                    </div>
                                </div>

                                <div class="header-articles-item">
                                    <span><?php echo e($article->title); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="detalist-articles-item">
                            <?php echo $article->description; ?>

                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    <div class="mt-4">
        <?php echo e($articles->links('site.components.pagination')); ?>

    </div>
</section>


<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/articles/articles-component.blade.php ENDPATH**/ ?>