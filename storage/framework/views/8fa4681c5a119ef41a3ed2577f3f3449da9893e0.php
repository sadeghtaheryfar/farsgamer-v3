<section>
    <div class="flex gap-2 items-center mb-4 mt-8 lg:mb-6 lg:mt-10">
        <i class="icon-comment text-xl"></i>
        <h2 class="font-bold text-lg">نظرات اخیر</h2>
    </div>

    <div class="swiper mySwiper-comment-home">
        <div class="swiper-wrapper">

            <?php $__currentLoopData = $recentComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide swiper-slide-comment-home">
                    <div class="box-comment-slider">
                        <div class="flex-box flex-right">
                            <div class="date-momment-slider flex-box flex-column">
                                <span><?php echo e(jalaliDate($comment->created_at, '%d')); ?></span>

                                <span><?php echo e(jalaliDate($comment->created_at, '%B')); ?></span>
                            </div>

                            <div>
                                <div class="header-momment-slider">
                                    <span><?php echo e($comment->user->username); ?></span>
                                </div>

                                <div class="flex-box flex-right">
                                    <img class="icon-star" src="img/star-fill.svg" alt="">
                                    <img class="icon-star" src="img/star-fill.svg" alt="">
                                    <img class="icon-star" src="img/star-fill.svg" alt="">
                                    <img src="img/star-white.svg" alt="">
                                    <img src="img/star-white.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="message-comment-slider">
                            <span><?php echo e($comment->comment); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="swiper-pagination swiper-pagination-comment flex-box"></div>
    </div>
</section><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/homes/recent-comments.blade.php ENDPATH**/ ?>