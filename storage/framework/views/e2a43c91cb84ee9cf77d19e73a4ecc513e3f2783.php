<div wire:init="$set('readyToLoad', true)">

    <?php echo e(Breadcrumbs::view('site.components.breadcrumb', 'articles.show', $article)); ?>


    
    <section class="P-4 overflow-hidden rounded-2xl bg-white lg:p-8">
        <div class="bg-gray-50 rounded-2xl grid gap-4 p-4 sm:flex sm:items-center">
            <img class="w-full rounded-2xl sm:w-52" src="<?php echo e(asset($article->image)); ?>" alt="">
            <div class="grid gap-4 px-2 sm:h-full sm:content-between lg:py-2 lg:px-0">
                <h1 class="text-lg font-bold"><?php echo e($article->title); ?></h1>
                <ul class="text-gray-500 text-sm">
                    <li>تاریخ: <span><?php echo e(jalaliDate($article->created_at, '%d %B %Y')); ?></span></li>
                    <li>نویسنده: <span>مدیریت فارس گیمر</span></li>
                </ul>
            </div>
        </div>
        <div class="posttype-content__description mt-4 p-4 px-6 lg:px-2">
            <?php echo $article->description; ?>

        </div>
    </section>

    <section class="posttype-content">
        <ul class="posttype-content__tabs">

            
            <li easytab-tab class="posttype-content__tab active">
                <a class="posttype-content__tab-link">
                    <i class="posttype-content__tab-icon icon-filter"></i>
                    <span>نظرات <span class="text-sm"><?php echo e("($commentsCount)"); ?></span></span>
                </a>
            </li>
        </ul>
        <div>

            
            <div easytab-content class="active">
                <div class="posttype-content__comments">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('site.components.products.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(method_exists($comments, 'links')): ?>
                        <?php echo e($comments->links('site.components.load-more')); ?>

                    <?php endif; ?>

                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.articles.article-create-comment', ['article' => $article])->html();
} elseif ($_instance->childHasBeenRendered('l1383946658-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1383946658-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1383946658-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1383946658-0');
} else {
    $response = \Livewire\Livewire::mount('site.articles.article-create-comment', ['article' => $article]);
    $html = $response->html();
    $_instance->logRenderedChild('l1383946658-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/articles/article-component.blade.php ENDPATH**/ ?>