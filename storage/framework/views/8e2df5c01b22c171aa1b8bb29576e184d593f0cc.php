<div>
    <form class="comment__form mt-8" wire:submit.prevent="store()">
        <div class="comment__form-head">
            <h6 class="comment__form-title">نظرات</h6>
        </div>
        <div class="comment__form-content">
            <?php if(auth()->guard()->guest()): ?>
                <p>برای ثبت نظر <a href="<?php echo e(route('auth')); ?>"><span class="text-primary font-semibold">وارد</span></a> سایت شوید</p>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
                <p>شما به عنوان <span class="text-primary font-semibold"><?php echo e(auth()->user()->username); ?></span> نظر خود را می‌نویسید.</p>

                <?php if(session()->has('article-comment-created')): ?>
                    <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e(session('article-comment-created')); ?></p>
                <?php endif; ?>

                <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="نظر خود را بنوسید" wire:model.defer="comment"></textarea>
                <button class="comment__form-submit" type="submit">ارسال نظر</button>
            <?php endif; ?>
        </div>
    </form>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/articles/articles-create-comment.blade.php ENDPATH**/ ?>