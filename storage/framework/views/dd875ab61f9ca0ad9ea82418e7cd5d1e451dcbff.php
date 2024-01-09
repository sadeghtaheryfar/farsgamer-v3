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

                    <?php if(method_exists($comments, 'links')): ?>
                        <?php echo e($comments->links('site.components.load-more')); ?>

                    <?php endif; ?>
            </div>
        </div>

        
        <div easytab-content>
            <div class="posttype-content__question-and-answer">
                <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.products.product-question', ['product' => $product,'question' => $question])->html();
} elseif ($_instance->childHasBeenRendered('O0giXZp')) {
    $componentId = $_instance->getRenderedChildComponentId('O0giXZp');
    $componentTag = $_instance->getRenderedChildComponentTagName('O0giXZp');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('O0giXZp');
} else {
    $response = \Livewire\Livewire::mount('site.products.product-question', ['product' => $product,'question' => $question]);
    $html = $response->html();
    $_instance->logRenderedChild('O0giXZp', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="<?php echo e(asset('site/svg/no-questions.svg')); ?>" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس سوالی نداشته</p>
                    </div>
                <?php endif; ?>

                    <?php if(method_exists($questions, 'links')): ?>
                        <?php echo e($questions->links('site.components.load-more')); ?>

                    <?php endif; ?>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.products.product-create-question', ['product' => $product])->html();
} elseif ($_instance->childHasBeenRendered('9N0GOCh')) {
    $componentId = $_instance->getRenderedChildComponentId('9N0GOCh');
    $componentTag = $_instance->getRenderedChildComponentTagName('9N0GOCh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9N0GOCh');
} else {
    $response = \Livewire\Livewire::mount('site.products.product-create-question', ['product' => $product]);
    $html = $response->html();
    $_instance->logRenderedChild('9N0GOCh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/components/products/content.blade.php ENDPATH**/ ?>