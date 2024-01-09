<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'سفارش','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

    <div class="content d-flex flex-column-fluid" >
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
                                <th>محصول</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
							<?php
							$label=[
								'wc-completed' => '#07ed1a',
								'wc-refunded' => '#ed3907',
								'wc-cancelled' => '#edac07',
								'wc-post' => '#77a9ff',
								'wc-failed' => '#f9a45e',
								'wc-custom-status' => '#7d8ff2',
								'wc-processing' => '#b5e645',
								'delay' => '#c64825',
								'speed_plus' => '#8768d8',
								'wc-on-hold' => '#dc4e3f',
								'wc-pending' => '#bdf2cb',
								'wc-breacked' => '#fa1100'
							];
							?>
                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->order_id + \App\Models\Order::CHANGE_ID); ?></td>
                                    <td><?php echo e(($item->product_data['title'] ?? '')); ?></td>
                                    <td><span style="background-color:<?php echo e($label[$item->status]); ?> ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);"><?php echo e($item->status_label); ?></span></td>
                                   
                                   
                                    <td><?php echo e(jalaliDate($item->order->created_at)); ?></td>
                                    <td>
										<div style="display: inline-block;background: #f3f6f9;width: 35px;height: 33px;position: relative;top: 5px;right: -7px;border-radius: 4px;">
										<i data-container="body" data-toggle="popover" data-placement="top"
                                        data-content="<?php echo e($item->order->notes->last()->note ?? ''); ?>" class="flaticon-eye fa-2x" style=" top: 1px;position: relative;left: -4px;"></i>
										</div>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['href' => ''.e(route('partner.order',
                                            ['action'=>'edit', 'id' => $item->id])).'']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('partner.order',
                                            ['action'=>'edit', 'id' => $item->id])).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
											
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="8">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($orders->links('admin.components.pagination')); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/partner/orders/index-order.blade.php ENDPATH**/ ?>