<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('vmDY3ih')) {
    $componentId = $_instance->getRenderedChildComponentId('vmDY3ih');
    $componentTag = $_instance->getRenderedChildComponentTagName('vmDY3ih');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('vmDY3ih');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('vmDY3ih', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 2xl:col-start-3 h-full">
        <div class="grid gap-4">
            <?php $__currentLoopData = $userNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="comment">
                <div class="comment__head">
                    <div class="comment__info">
                        <!-- Date -->
                        <div class="comment__date">
                            <span class="comment__date-day"><?php echo e(jalaliDate($item->created_at, '%d')); ?></span>
                            <span class="comment__date-month"><?php echo e(jalaliDate($item->created_at, '%B')); ?></span>
                        </div>
                        <div class="comment__user">
                            <!-- user f and l name -->
                            <span class="comment__user-name">اعلان جدید</span>
                        </div>
                    </div>
                    <!-- Tags -->
                    <div class="comment__tags">
                        <span class="comment__tag text-primary">اطلاعیه شما</span>
                    </div>
                </div>
                <div class="comment__body">
                    <div class="comment__content">
                        <!-- actual content of the comment -->
                        <p class="comment__message"><?php echo e($item->note); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/dashboard/notifications-component.blade.php ENDPATH**/ ?>