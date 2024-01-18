<div>
    <div class="comment comment--reply">
        <div class="comment__head">
            <div class="comment__info">
                <div class="comment__date">
                    <span class="comment__date-day"><?php echo e(jalaliDate($question->created_at, '%d')); ?></span>
                    <span class="comment__date-month"><?php echo e(jalaliDate($question->created_at, '%B')); ?></span>
                </div>
                <div class="comment__user">
                    <span class="comment__user-name"><?php echo e($question->user->username); ?></span>
                </div>
            </div>
        </div>
        <div class="comment__body">
            <div class="comment__content" x-data="{open: false}">
                <div class="comment__content-icon">
                    <i class="icon-quote"></i>
                </div>
                <p class="comment__message"><?php echo e($question->text); ?></p>
                <button class="comment__reply-btn" @click="open = !open">پاسخ به پرسش</button>
                <form class="comment__form mt-4" x-show="open" wire:submit.prevent="storeAnswer()">
                    <?php if(auth()->guard()->guest()): ?>
                        <p class="comment__form-content">برای ثبت پاسخ <a href="<?php echo e(route('auth')); ?>"><span class="text-primary font-semibold">وارد</span></a> سایت شوید</p>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <div class="comment__form-head">
                            <h6 class="comment__form-title">شما به عنوان <span class="text-primary font-semibold"><?php echo e(auth()->user()->username); ?></span> به این سوال پاسخ
                                میدهید.
                            </h6>
                        </div>
                        <div class="comment__form-content">
                            <?php if(session()->has('product-answer-created')): ?>
                                <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e(session('product-answer-created')); ?></p>
                            <?php endif; ?>

                            <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="پاسخ خود را بنویسید" wire:model.defer="answer"></textarea>
                            <button class="comment__form-submit" type="submit">ارسال پاسخ</button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
            <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comment">
                    <div class="comment__head">
                        <div class="comment__info">
                            <div class="comment__user">
                                <span class="comment__user-name"><?php echo e($answer->user->username); ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="comment__body">
                        <div class="comment__content">
                            <div class="comment__content-icon">
                                <i class="icon-question"></i>
                            </div>
                            <p class="comment__message"><?php echo e($answer->text); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/products/products-question.blade.php ENDPATH**/ ?>