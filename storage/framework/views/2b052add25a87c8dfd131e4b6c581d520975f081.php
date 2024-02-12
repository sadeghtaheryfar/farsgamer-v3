<div class="box-message-detalist-product hide-item-pc">
    <div class="show-menu-message-detalist-product flex-box">
        <div class="menu-message-detalist-product flex-box">
            <a id="btn-detalist-prudect-page" href="#detalist-prudect-page"
                class="item-menu-message-detalist-product flex-box menu-message-detalist-product-active">
                <span>مشخصات</span>
            </a>

            <a id="btn-comments-prudect-page" href="#comments-prudect-page"
                class="item-menu-message-detalist-product flex-box">
                <span>نظرات</span>
            </a>

            <a id="btn-question-prudect-page" href="#question-prudect-page"
                class="item-menu-message-detalist-product flex-box">
                <span>پرسش و پاسخ</span>
            </a>
        </div>
    </div>

    <div id="detalist-prudect-page"></div>

    <div class="box-table-detalist-product flex-box flex-column">
        <?php echo $product->description; ?>

    </div>

    <div id="comments-prudect-page"></div>

    <div class="box-comments-detalist-product">
        <div class="show-box-comments-detalist-product">
            <div>
                <span>نظرات اخیر</span>
            </div>

            <div>
                <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php echo $__env->make('site.components.products.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="<?php echo e(asset('site/svg/no-comments.svg')); ?>" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس نظرشو نگفته</p>
                    </div>
                <?php endif; ?>
            </div>

            <div>
                
            </div>
        </div>
    </div>

    <div id="question-prudect-page"></div>
    <div class="show-box-comments-detalist-product">
        <div>
            <span>پرسش و پاسخ</span>
        </div>


        <div class="box-answer-comments-detalist-product">
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
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/components/products/content.blade.php ENDPATH**/ ?>