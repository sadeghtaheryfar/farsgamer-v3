<div>
    <form class="comment__form mt-8" wire:submit.prevent="storeQuestion()">
        <div class="comment__form-head">
            <h6 class="comment__form-title">پرسش</h6>
        </div>
        <div class="comment__form-content">
            <?php if(auth()->guard()->guest()): ?>
                <p>برای ثبت پرسش <a href="<?php echo e(route('auth')); ?>"><span class="text-primary font-semibold">وارد</span></a> سایت شوید</p>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
                <p>شما به عنوان <span class="text-primary font-semibold"><?php echo e(auth()->user()->username); ?></span> سوال خود را می‌نویسید.</p>

                <?php if(session()->has('product-question-created')): ?>
                    <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e(session('product-question-created')); ?></p>
                <?php endif; ?>

                <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="سوال خود را بپرسید" wire:model.defer="question"></textarea>
                <button class="comment__form-submit" type="submit">ارسال پرسش</button>
            <?php endif; ?>
        </div>
    </form>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/products/products-create-question.blade.php ENDPATH**/ ?>