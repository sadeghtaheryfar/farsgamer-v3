<div class="comment">
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
            <div class="comment__quote-icon">
                <i class="icon-quote"></i>
            </div>
            <p class="comment__message"><?php echo e($comment->comment); ?></p>
        </div>

        
        <?php if($comment->answer): ?>
            <div class="comment">
                <div class="comment__head">
                    <div class="comment__info">
                        <i class="icon-user min-w-12 min-h-12 max-w-12 max-h-12 bg-yellow rounded-xl flex items-center justify-center text-white"></i>
                        <div class="comment__user">
                            <span class="comment__user-name">مدیریت فارس گیمر</span>
                        </div>
                    </div>
                </div>
                <div class="comment__body">
                    <div class="comment__content">
                        <div class="comment__quote-icon">
                            <i class="icon-quote"></i>
                        </div>
                        <p class="comment__message"><?php echo e($comment->answer); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/products/comment.blade.php ENDPATH**/ ?>