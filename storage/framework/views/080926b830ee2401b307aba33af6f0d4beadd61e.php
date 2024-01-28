<div>
    <div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">

        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.dashboard.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('l3061349887-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3061349887-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3061349887-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3061349887-0');
} else {
    $response = \Livewire\Livewire::mount('site.dashboard.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('l3061349887-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
            <?php if(sizeof($orders) == 0): ?>
                <div class="grid justify-center items-center h-full p-4 py-8 lg:px-6 lg:py-12 text-center">
                    <div class="grid gap-4">
                        <img class="w-60" src="<?php echo e(asset('site/svg/empty-cart.svg')); ?>" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">سفارشی ثبت نشده</p>
                    </div>
                </div>
            <?php else: ?>
                <div class="do">
                    <div class="do__head">
                        <div class="do__head-cell do__item-cell__code">کد سفارش</div>
                        <div class="do__head-cell do__item-cell__date">تاریخ</div>
                        <div class="do__head-cell do__item-cell__price">قیمت</div>
                        <div class="do__head-cell do__item-cell__buttons">پیگیری</div>
                    </div>
                    <div class="do__item-list">
                        <?php $__currentLoopData = $orders->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="do__item" x-data="{open : false}">
                                <div class="do__item-cell-list">


                                    <!-- code -->
                                    <div class="do__item-cell do__item-cell__code">
                                        <div class="font-semibold text-sm flex">
                                            <p class="font-isans-ed select-all"><?php echo e($item->tracking_code); ?></p>
                                            <p class="text-gray2-700">#</p>
                                        </div>
                                    </div>

                                    <!-- date -->
                                    <div class="do__item-cell do__item-cell__date">
                                        <div class="date-box">
                                            <p class="date-box__day"><?php echo e(jalaliDate($item->created_at, '%d')); ?></p>
                                            <p class="date-box__month"><?php echo e(jalaliDate($item->created_at, '%B')); ?></p>
                                        </div>
                                    </div>

                                    <!-- price -->
                                    <div class="do__item-cell do__item-cell__price">
                                        <div class="grid gap-1">
                                            <div class="flex items-center gap-1 whitespace-nowrap">
                                                <p class="font-semibold"><?php echo e(number_format($item->total_price)); ?></p>
                                                <p class="text-sm">تومان</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- buttons -->
                                    <div class="do__item-cell do__item-cell__buttons">
                                        <div class="grid gap-1">
                                            <a href="<?php echo e(route('dashboard.orders.show', $item->id + \App\Models\Order::CHANGE_ID)); ?>"
                                               class="btn px-8 btn-primary btn-xs btn-outline w-full">نمایش</a>
                                            <button class="btn px-8 btn-primary btn-outline btn-xs w-full" @click="open = !open">
                                                <i class="icon-plus text-sm hidden leading-0"></i>
                                                <span>پیگیری</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <div class="pt-4 border-t border-gray-200 collapse" x-bind:class="{ 'collapse': !open }">
                                    <div class="grid gap-4">
                                        <?php $__currentLoopData = $item->userNotes->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="comment comment--ligth">
                                                <div class="comment__head">
                                                    <div class="comment__info items-start xs:items-center">
                                                        <!-- Date -->
                                                        <div class="comment__date">
                                                            <span class="date-box__day"><?php echo e(jalaliDate($note->created_at, '%d')); ?></span>
                                                            <span class="date-box__month"><?php echo e(jalaliDate($note->created_at, '%B')); ?></span>
                                                        </div>

                                                        <div class="flex items-center gap-1 flex-wrap text-sm text-gray2-700">
                                                            <span><?php echo e(jalaliDate($note->created_at, 'H:i')); ?></span>
                                                            <span>سفارش</span>
                                                            <span class="text-red font-semibold dir-ltr">
                                                                <span class="text-gray2-700">#</span>
                                                                <span class="font-isans-ed select-all"><?php echo e($item->tracking_code); ?></span>
                                                            </span>
                                                            <span>در حال حاضر در وضعیت</span>
                                                            <span class="text-red font-semibold"><?php echo e($item->status_label); ?></span>
                                                            <span>می‌باشد.</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="comment__body">
                                                    <!-- comment item depth 2 -->
                                                    <div class="comment comment--ligth gap-y-2 gap-x-4 grid xs:flex">
                                                        <div class="flex items-center xs:justify-items-center gap-2 w-12 xs:gap-1 xs:grid xs:items-start xs:content-start xs:justify-center">
                                                            <i class="icon-user min-w-12 min-h-12 max-w-12 max-h-12 bg-yellow rounded-xl flex items-center justify-center text-white"></i>
                                                            <p class="font-semibold xs:font-normal xs:text-xs"><?php echo e(is_null($note->user_id) ? 'سیستم' : 'پشتیبانی'); ?></p>
                                                        </div>
                                                        <div class="comment__body mt-0">
                                                            <div class="comment__message">
                                                                <p><?php echo e($note->note); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php echo $orders->links('site.components.pagination'); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%H:%M:%S'));
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/dashboard/my-orders-component.blade.php ENDPATH**/ ?>