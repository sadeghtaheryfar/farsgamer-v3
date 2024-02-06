<div>
    <form class="bg-white rounded-2xl p-4 md:p-6" wire:submit.prevent="store()">
        <h4>ثبت نظر</h4>
        <?php if($errors->any()): ?>
            <?php echo implode('', $errors->all('<p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">:message</p>')); ?>

        <?php endif; ?>

        <?php if(session()->has('success')): ?>
            <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e(session('success')); ?></p>
        <?php endif; ?>
        <?php if(session()->has('error')): ?>
            <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium"><?php echo e(session('error')); ?></p>
        <?php endif; ?>
        <label>
            <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="نظر خود را وارد نمایید" wire:model.defer="model.comment"></textarea>
        </label>
        <div class="flex flex-wrap items-center justify-between mt-4 gap-2">

            
            <div class="flex items-center gap-4">
                <p class="text-sm">میزان رضایت شما از این سفارش چه مقدار است؟</p>
                <div class="stars">
                    <i class="<?php echo e(($model['rating'] >= 5) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"
                       wire:click="setRating(5)"></i>
                    <i class="<?php echo e(($model['rating'] >= 4) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"
                       wire:click="setRating(4)"></i>
                    <i class="<?php echo e(($model['rating'] >= 3) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"
                       wire:click="setRating(3)"></i>
                    <i class="<?php echo e(($model['rating'] >= 2) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"
                       wire:click="setRating(2)"></i>
                    <i class="<?php echo e(($model['rating'] >= 1) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'); ?>"
                       wire:click="setRating(1)"></i>
                </div>
            </div>

            
            <button type="submit" class="btn btn-primary btn-xs">ثبت نظر</button>
        </div>
    </form>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/dashboard/create-comments.blade.php ENDPATH**/ ?>