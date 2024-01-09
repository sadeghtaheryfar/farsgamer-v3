<section>
    <div class="flex gap-2 items-center mb-4 mt-8 lg:mb-6 lg:mt-10">
        <i class="icon-comment text-xl"></i>
        <h2 class="font-bold text-lg">نظرات اخیر</h2>
    </div>
    <div class="review-slider swiper-container relative pb-8">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = $recentComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                    <div class="comment bg-white">
                        <div class="comment__head">
                            <div class="comment__info">
                                <div class="comment__date">
                                    <span class="comment__date-day"><?php echo e(jalaliDate($comment->created_at, '%d')); ?></span>
                                    <span class="comment__date-month"><?php echo e(jalaliDate($comment->created_at, '%B')); ?></span>
                                </div>
                                <div class="comment__user">
                                    <span class="comment__user-name"><?php echo e($comment->user->username); ?></span>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.site.rating-star','data' => ['rating' => $comment->rating]]); ?>
<?php $component->withName('site.rating-star'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['rating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($comment->rating)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="comment__body">
                            <div class="comment__content">
                                <div class="comment__content-icon">
                                    <i class="icon-quote"></i>
                                </div>
                                <p class="comment__message"><?php echo e($comment->comment); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-pagination bottom-0"></div>
    </div>
</section><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/recent-comments.blade.php ENDPATH**/ ?>