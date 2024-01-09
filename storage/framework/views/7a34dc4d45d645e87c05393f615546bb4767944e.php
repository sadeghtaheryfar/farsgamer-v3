<section>
    <div class="flex items-center justify-between mb-4 mt-8 lg:mb-6 lg:mt-10">
        <div class="flex gap-2 items-center mb-4 mt-8">
            <i class="icon-articles text-xl"></i>
            <h2 class="font-bold text-lg">پست آموزشی</h2>
        </div>
        <a class="flex gap-2 items-center" href="<?php echo e(route('articles')); ?>">
            <span class="text-sm lg:text-base">مشاهده همه</span>
            <i class="icon-angle-left text-xl"></i>
        </a>
    </div>


    <!-- Swiper -->
    <div class="post-slider swiper-container relative pb-8">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <a class="post-box post-box--slide" href="<?php echo e(route('articles.show', $article->slug)); ?>">
                        <img class="post-box__image" src="<?php echo e(asset($article->image)); ?>" alt="">
                        <div class="post-box__content">
                            <h3 class="post-box__title"><?php echo e($article->title); ?></h3>
                            <div class="post-box__btn">مشاهده</div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Slider Pagination -->
        <div class="swiper-pagination bottom-0"></div>
    </div>
</section><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/recent-articles.blade.php ENDPATH**/ ?>