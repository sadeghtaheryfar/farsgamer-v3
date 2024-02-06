<section class="section-home mt-8">
    <section id="show-articles-home">
        <div class="flex-box flex-justify-space margin-vetical-1">
            <div class="text-header-sec flex-box">
                <span>آخرین مقالات</span>
            </div>


            <a href="<?php echo e(route('articles')); ?>" class="btn-more-sec flex-box color-blue">
                <span>مشاهده بیشتر مقالات</span>

                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                        stroke="#3D42DF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="flex-box flex-justify-space flex-wrap">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-articles">
                    <a href="<?php echo e(route('articles.show', $article->slug)); ?>">
                        <img class="img-item-articles" src="<?php echo e(asset($article->image)); ?>" alt="">

                        <div class="box-message-articles">
                            <div class="name-item-articles">
                                <span><?php echo e(!empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی'); ?></span>
                            </div>

                            <div class="message-item-articles">
                                <p><?php echo e($article->title); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</section>



<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/homes/recent-articles.blade.php ENDPATH**/ ?>