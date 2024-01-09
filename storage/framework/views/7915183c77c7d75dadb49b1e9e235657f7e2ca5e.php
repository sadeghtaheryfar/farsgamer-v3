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

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
					
                    <div class="form-group col-12">
					<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link  m-2" wire:click="$set('status', '')"><?php echo e(auth()->user()->translate('همه')); ?>    </button>
                        <?php $__currentLoopData = \App\Models\Order::getOrdersStatus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($key == \App\Models\Order::STATUS_CANCELLED): ?>
								<?php continue; ?>
							<?php endif; ?>
                            <?php if($status == $key): ?>
                                <button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-outline-success disabled  m-2" wire:click="$set('status', '<?php echo e($key); ?>')"><?php echo e(auth()->user()->translate($item)); ?>  (<?php echo e($statusCount[$key]); ?>)  </button>
                            <?php else: ?>
                                <button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link  m-2" wire:click="$set('status', '<?php echo e($key); ?>')"><?php echo e(auth()->user()->translate($item)); ?> (<?php echo e($statusCount[$key]); ?>)</button>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php echo $__env->make('admin.components.advanced-table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(auth()->user()->translate('سفارش')); ?></th>
                                <th><?php echo e(auth()->user()->translate('محصول')); ?></th>
                                <th><?php echo e(auth()->user()->translate('وضعیت')); ?></th>
                              
                                <th><?php echo e(auth()->user()->translate('تاریخ')); ?></th>
                                <th><?php echo e(auth()->user()->translate('عملیات')); ?></th>
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
                            <?php $__empty_1 = true; $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->order_id + \App\Models\Order::CHANGE_ID); ?></td>
                                    <td><?php echo e(auth()->user()->translate($item->product->title)); ?></td>
                                    <td><span style="background-color:<?php echo e($label[$item->status]); ?> ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);"> <?php echo e(auth()->user()->translate($item->status_label)); ?></span></td>
                                    <td><?php echo e(auth()->user()->language == 'basic' ? jalaliDate($item->order->created_at) : $item->order->created_at); ?></td>
                                    <td>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['href' => ''.e(route('admin.products.order.store',
                                            ['action'=>'edit', 'id' => $item->id])).'']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.products.order.store',
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
                    <?php echo e($orderDetails->links('admin.components.pagination')); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/products/index-product-order.blade.php ENDPATH**/ ?>