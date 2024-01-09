<div class="grid gap-4 xl:grid-cols-12 xl:items-start xl:gap-8">

    
    <div class="modal fade" id="orderNotCompleted" tabindex="-1" aria-labelledby="orderNotCompletedLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- <div class="modal-header">
                  <h5 class="modal-title" id="orderNotCompletedLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body text-right p-6 leading-5">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ. لورم ایپسوم متن ساختگی با تولید سادگی
                    نامفهوم از صنعت چاپ
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">متوجه شدم</button>
                </div>
            </div>
        </div>
    </div>

    <div class="xl:col-start-1 xl:col-end-9 2xl:col-end-10 xl:row-span-full overflow-hidden">
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            <h1 class="font-semibold text-lg mb-4">جزئیات سفارش</h1>
            <div class="table-wrapper">
                <table>
                    <thead class="mb-4 text-sm">
                    <tr class="text-gray-500">
                        <th>محصول</th>
                        <th></th>
                        <th>تعداد</th>
                        <th>جمع جزء</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="h-2 last:h-0"></tr>
                        <tr class="order-details__item border-0">
                            <td class="bg-gray-50 rounded-r-2xl w-28 h-28">
                                <img class="rounded-xl min-w-28 min-h-28" src="<?php echo e(asset($item->product->image)); ?>" alt="">
                            </td>
                            <td class="bg-gray-50">
                                <h3 class="font-semibold mb-2 text-sm min-w-24">
                                    <?php echo e($item->product->title); ?> <br>
                                    <?php echo e($item->status_label); ?> <br>
                                    <?php if(\Illuminate\Support\Carbon::make($order->created_at)
                                        ->addHours($item->product->delivery_time)
                                        ->isPast() && $item->status != \App\Models\Order::STATUS_COMPLETED): ?>
                                        <button class="btn px-8 btn-primary btn-xs btn-outline" data-bs-toggle="modal" data-bs-target="#orderNotCompleted"
                                                wire:click="orderNotCompleted(<?php echo e($item->id); ?>)">سفارش انجام نشده؟</button>
                                    <?php else: ?>
                                        <p data-countdown="<?php echo e(\Illuminate\Support\Carbon::make($order->created_at)->addHours($item->product->delivery_time)); ?>"></p>
                                    <?php endif; ?>
                                </h3>
                                <ul class="order-details__item__extra-content text-sm">
                                    <?php $__currentLoopData = $item['form']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($form['type'] != 'paragraph'): ?>
                                            <li class="flex">
                                                <span><?php echo $form['label']; ?></span>
                                                <span class="font-medium"><?php echo e($form['value']); ?></span>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($item['licenses'] != ''): ?>
                                        <?php $__currentLoopData = $item['licenses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="flex">
                                                <span>کد: </span>
                                                <span class="font-medium"><?php echo e($license); ?></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </td>
                            <td class="bg-gray-50">
                                <div class="bg-white rounded-2xl w-16 h-10 flex items-center justify-center"><?php echo e($item['quantity']); ?></div>
                            </td>
                            <td class="bg-gray-50">
                                <div class="flex items-center gap-1 whitespace-nowrap">
                                    <p class="text-lg font-semibold"><?php echo e(number_format($item['price'] * $item['quantity'])); ?></p>
                                    <p class="text-sm">تومان</p>
                                </div>
                            </td>
                            <td class="bg-gray-50 rounded-l-2xl">
                                <button class="order-details__item__toggle-content bg-primary hover:bg-opacity-100 bg-opacity-10 w-8 h-8
                                 flex items-center justify-center group rounded-xl transition-colors duration-150 ease-in">
                                    <i class="icon-angle-down text-primary group-hover:text-white"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <hr class="border-gray-200 my-4">

            <ul class="space-y-2 text-sm">
                    <li class="flex items-center justify-between">
                        <p class="font-semibold">جمع کل سبد خرید</p>
                        <div class="flex items-center gap-1 whitespace-nowrap">
                            <p class="font-semibold"><?php echo e(number_format($order->price)); ?></p>
                            <p class="text-sm">تومان</p>
                        </div>
                    </li>
                    <?php if($order->discount): ?>
                        <li class="flex items-center justify-between">
                            <p class="font-semibold">تخفیف</p>
                            <div class="flex items-center gap-1 whitespace-nowrap">
                                <p class="font-semibold"><?php echo e(number_format($order->discount)); ?></p>
                                <p class="text-sm">تومان</p>
                            </div>
                        </li>
                    <?php endif; ?>
                                        <?php if($order->voucher_amount): ?>
                                            <li class="flex items-center justify-between">
                                                <p class="font-semibold">کد تخفیف</p>
                                                <div class="flex items-center gap-1 whitespace-nowrap">
                                                    <p class="font-semibold"><?php echo e(number_format($order->discount_code)); ?></p>
                                                    <p class="text-sm">تومان</p>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                    <?php if($order->wallet_pay): ?>
                        <li class="flex items-center justify-between">
                            <p class="font-semibold">کیف پول</p>
                            <div class="flex items-center gap-1 whitespace-nowrap">
                                <p class="font-semibold"><?php echo e(number_format($order->wallet_pay)); ?></p>
                                <p class="text-sm">تومان</p>
                            </div>
                        </li>
                    <?php endif; ?>
                    <li class="flex items-center justify-between">
                        <p class="font-semibold text-lg text-red">قیمت نهایی</p>
                        <div class="flex items-center gap-1 whitespace-nowrap text-lg text-red">
                            <p class="text-lg font-semibold"><?php echo e(number_format($order->total_price)); ?></p>
                            <p class="text-sm">تومان</p>
                        </div>
                    </li>
            </ul>
        </div>
    </div>

    <div class="xl:col-start-9 xl:col-end-13 2xl:col-start-10 xl:row-span-full">
        <a class="p-4 lg:p-6 bg-white rounded-2xl flex items-center justify-center gap-2 mb-4 link-transition hover:text-primary-deep"
           href="<?php echo e(route('home')); ?>">
            <i class="icon-arrow-right-square"></i>
            <p>بازگشت به خانه</p>
        </a>
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            <div class="bg-gray-50 text-primary border border-primary rounded-2xl text-center" wire:ignore>
                <p class="px-3 py-2">زمان تحویل</p>
                <p class="px-3 py-2 font-medium border-t border-primary text-2xl" data-countdown="<?php echo e($order->delivery_time); ?>"></p>
            </div>

            <ul class="mt-4 space-y-2 text-base">
                <?php if($order): ?>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">شماره سفارش</p>
                        <p class="dir-ltr font-semibold">
                            <span class="text-gray2-700">#</span><span class="font-isans-ed select-all"><?php echo e($order->tracking_code); ?></span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">تاریخ</p>
                        <p class="font-semibold"><?php echo e(jalaliDate($order->created_at, '%d %B %Y')); ?></p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">نام</p>
                        <p class="font-semibold"><?php echo e($order->full_name); ?></p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">موبایل</p>
                        <p class="font-semibold"><?php echo e($order->mobile); ?></p>
                    </li>
                    <li class="flex flex-wrap items-center justify-between">
                        <p class="text-gray-500 font-semibold">ایمیل</p>
                        <p class="font-semibold break-words"><?php echo e($order->email); ?></p>
                    </li>
                    <?php if($order->description): ?>
                        <li class="flex items-center justify-between">
                            <p class="text-gray-500 font-semibold">توضیحات</p>
                            <p class="font-semibold"><?php echo e($order->description); ?></p>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

            <hr class="border-gray-200 my-4">

            <div class="mt-4">
                <p class="mb-2 font-semibold">کدهای خریداری شده</p>
                <ul class="grid gap-2 text-sm text-white text-opacity-95 font-semibold">
                    <?php $__currentLoopData = $order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item['licenses'] != ''): ?>
                            <?php $__currentLoopData = $item['licenses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="flex items-center gap-2 justify-between p-3 bg-primary rounded-2xl text-white">
                                    <p class="font-isans-ed mx-auto select-all"><?php echo e($license); ?></p>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
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
<?php $__env->stopPush(); ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/dashboard/show-order-component.blade.php ENDPATH**/ ?>