<section class="posttype-content">

    <ul class="posttype-content__tabs">
        <li easytab-tab class="posttype-content__tab active">
            <a class="posttype-content__tab-link">
                <i class="posttype-content__tab-icon icon-filter"></i>
                <span>توضیحات</span>
            </a>
        </li>
        <li easytab-tab class="posttype-content__tab">
            <a class="posttype-content__tab-link">
                <i class="posttype-content__tab-icon icon-comment"></i>
                <span>نظرات <span class="text-sm">(<?php echo e($commentsCount); ?>)</span></span>
            </a>
        </li>
        <li easytab-tab class="posttype-content__tab">
            <a class="posttype-content__tab-link">
                <i class="posttype-content__tab-icon icon-question-answer"></i>
                <span>پرسش و پاسخ <span class="text-sm">(<?php echo e($questionsCount); ?>)</span></span>
            </a>
        </li>
    </ul>

    <div>

        
        <div easytab-content class="active">
            <div class="posttype-content__description">
                <?php echo $product->description; ?>

            </div>
        </div>

        
        <div easytab-content>
            <div class="posttype-content__comments">
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo $__env->make('site.components.products.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="<?php echo e(asset('site/svg/no-comments.svg')); ?>" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس نظرشو نگفته</p>
                    </div>
                <?php endif; ?>

                    
            </div>
        </div>

        
        <div easytab-content>
            <div class="posttype-content__question-and-answer">
                <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.products.product-question', ['product' => $product,'question' => $question])->html();
} elseif ($_instance->childHasBeenRendered('l3709647923-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3709647923-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3709647923-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3709647923-0');
} else {
    $response = \Livewire\Livewire::mount('site.products.product-question', ['product' => $product,'question' => $question]);
    $html = $response->html();
    $_instance->logRenderedChild('l3709647923-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="<?php echo e(asset('site/svg/no-questions.svg')); ?>" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس سوالی نداشته</p>
                    </div>
                <?php endif; ?>

                    

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.products.product-create-question', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('l3709647923-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l3709647923-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3709647923-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3709647923-1');
} else {
    $response = \Livewire\Livewire::mount('site.products.product-create-question', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('l3709647923-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
</section><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/products/content.blade.php ENDPATH**/ ?>