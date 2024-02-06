<section id="main-dashboard" class="flex-box flex-justify-space" style="align-items: normal;">
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

    <section id="left-dashboard">
        <div class="box-header-dash-order">
            <span>سفارشات من</span>
        </div>

        <div class="box-item-order-dash-order">
            <?php $__currentLoopData = $orders->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-order-dash-order margin-vetical-1">
                    <div class="box-header-item-order-dash-order flex-box flex-justify-space">
                        <div class="flex-box flex-right">
                            <div class="item-date-order-dash-order flex-box">
                                <div class="hide-item-pc"></div>

                                <span style="margin-left: 0.5rem"><?php echo e(jalaliDate($item->created_at, '%d %B %Y')); ?></span>
                            </div>

                            <div class="item-number-order-dash-order flex-box">
                                <div class="hide-item-pc"></div>

                                <span>کد سفارش:</span>

                                <span dir="ltr">#<?php echo e($item->tracking_code); ?></span>
                            </div>

                            <div class="item-price-order-dash-order flex-box">
                                <div></div>

                                <span><?php echo e(number_format($item->total_price)); ?></span>

                                <span>تومان</span>
                            </div>
                        </div>

                        <div class="flex-box">
                            <div class="box-status-order-dash-order">
                                <span>وضعیت سفارش : </span>

                                <span><?php echo e($item->status_label); ?></span>
                            </div>

                            <div>
                                <a href="<?php echo e(route('dashboard.orders.show', $item->id + \App\Models\Order::CHANGE_ID)); ?>"
                                    class="box-more-order-dash-order flex-box">
                                    <span>جزئیات محصول</span>

                                    <svg viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                                            stroke="#3D42DF" stroke-width="1.5" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="box-img-item-order-dash-order flex-box flex-right flex-wrap">
                        <?php $__currentLoopData = $item->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="img-item-order-dash-order">
                                <img src="<?php echo e(asset($detail->product->image)); ?>" alt="">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo $orders->links('site.components.pagination'); ?>

    </section>
</section><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/dashboard/my-orders-component.blade.php ENDPATH**/ ?>