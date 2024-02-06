<section id="main-dashboard" class="flex-box flex-justify-space" style="align-items: normal;">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('l2966490025-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2966490025-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2966490025-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2966490025-0');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l2966490025-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <section id="left-dashboard">
        <?php if(sizeof($comments) == 0 && sizeof($confirmedComments) == 0): ?>
            <div class="grid justify-center items-center h-full p-4 py-8 lg:px-6 lg:py-12 text-center">
                <div class="grid gap-4">
                    <img class="w-60" src="<?php echo e(asset('site/svg/no-comments.svg')); ?>" alt="">
                    <p class="font-bold md:text-md lg:text-2xl text-red">نظری ثبت نکرده اید.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="box-header-dash-comments flex-box flex-right">
                <div class="item-header-dash-comments header-dash-comments-active flex-box">
                    <span>در انتظار ثبت </span>

                    <span>(<?php echo e(count($comments)); ?>)</span>
                </div>

                <div class="item-header-dash-comments flex-box">
                    <span>نظرات من</span>

                    <span>(<?php echo e(count($confirmedComments)); ?>)</span>
                </div>
            </div>

            <div class="box-message-dash-comments">
                <div class="item-message-dash-comments">
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="dashboard-comment-awaiting-approval bg-gray-50 rounded-2xl p-3"
                            x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    
                                    <img class="w-20 h-20 rounded-xl" src="<?php echo e(asset($item->product->image ?? '')); ?>"
                                        alt="">
                                    
                                    <h3 class="font-semibold"><?php echo e($item->product->title ?? ''); ?></h3>
                                </div>
                                <button
                                    class="bg-primary hover:bg-opacity-100 bg-opacity-10 w-8 h-8
                                 flex items-center justify-center group rounded-xl transition-colors duration-150 ease-in"
                                    @click="open = !open">
                                    <i class="icon-angle-down text-primary group-hover:text-white"></i>
                                </button>
                            </div>
                            <div class="mt-4" x-bind:class="{ 'collapse': !open }">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.create-comments', ['orderId' => $item->order_id,'productId' => $item->product_id])->html();
} elseif ($_instance->childHasBeenRendered('comment-' . $item->id)) {
    $componentId = $_instance->getRenderedChildComponentId('comment-' . $item->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('comment-' . $item->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('comment-' . $item->id);
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.create-comments', ['orderId' => $item->order_id,'productId' => $item->product_id]);
    $html = $response->html();
    $_instance->logRenderedChild('comment-' . $item->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="item-message-dash-comments hide-item">
                    <?php $__currentLoopData = $confirmedComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('site.components.products.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endif; ?>
    </section>
</section>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/dashboard/my-comments-component.blade.php ENDPATH**/ ?>