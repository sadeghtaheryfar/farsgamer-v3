<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('39OdaZ3')) {
    $componentId = $_instance->getRenderedChildComponentId('39OdaZ3');
    $componentTag = $_instance->getRenderedChildComponentTagName('39OdaZ3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('39OdaZ3');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('39OdaZ3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
        <?php if(sizeof($comments) == 0 && sizeof($confirmedComments) == 0): ?>
            <div class="grid justify-center items-center h-full p-4 py-8 lg:px-6 lg:py-12 text-center">
                <div class="grid gap-4">
                    <img class="w-60" src="<?php echo e(asset('site/svg/no-comments.svg')); ?>" alt="">
                    <p class="font-bold md:text-md lg:text-2xl text-red">نظری ثبت نکرده اید.</p>
                </div>
            </div>
        <?php else: ?>
            <section class="dashboard-comments">

                <ul class="dashboard-comments__tabs">
                    <li easytab-tab class="dashboard-comments__tab active">در انتظار ثبت نظر (<?php echo e(count($comments)); ?>)</li>
                    <li easytab-tab class="dashboard-comments__tab">نظرات من (<?php echo e(count($confirmedComments)); ?>)</li>
                </ul>

                <div>
                    <div easytab-content class="active">
                        <div class="grid gap-4">
                            <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
                                <div class="dashboard-comment-awaiting-approval bg-gray-50 rounded-2xl p-3" x-data="{open : false}">
                                  <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-4">
                                            
                                            <img class="w-20 h-20 rounded-xl" src="<?php echo e(asset($item->product->image ?? '')); ?>" alt="">
                                            
                                            <h3 class="font-semibold leading-4"><?php echo e($item->product->title ?? ''); ?></h3>
                                        </div>
                                        <button class="bg-primary hover:bg-opacity-100 bg-opacity-10 w-8 h-8
                                 flex items-center justify-center group rounded-xl transition-colors duration-150 ease-in" @click="open = !open">
                                            <i class="icon-angle-down text-primary group-hover:text-white"></i>
                                        </button>
                                    </div>
                                    <div class="mt-4" x-bind:class="{ 'collapse': !open }">
                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.create-comments', ['orderId' => $item->order_id,'productId' => $item->product_id])->html();
} elseif ($_instance->childHasBeenRendered('comment-'.$item->id)) {
    $componentId = $_instance->getRenderedChildComponentId('comment-'.$item->id);
    $componentTag = $_instance->getRenderedChildComponentTagName('comment-'.$item->id);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('comment-'.$item->id);
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.create-comments', ['orderId' => $item->order_id,'productId' => $item->product_id]);
    $html = $response->html();
    $_instance->logRenderedChild('comment-'.$item->id, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    </div>
                                </div>
							
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div easytab-content>
                        <div class="grid gap-4">
                            <?php $__currentLoopData = $confirmedComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo $__env->make('site.components.products.comment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

            </section>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/dashboard/my-comments-component.blade.php ENDPATH**/ ?>