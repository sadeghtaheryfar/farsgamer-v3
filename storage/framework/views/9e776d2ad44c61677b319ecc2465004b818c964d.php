<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'آمار کدهای تخفیف','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'آمار کدهای تخفیف','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
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

                    <?php echo $__env->make('admin.components.advanced-table', ['searchAble' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد</th>
                                <th>تعداد استفاده</th>
                                <th>مبلغ استفاده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $vouchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->code); ?></td>
                                    <td><?php echo e($item->total_order); ?></td>
                                    <td><?php echo e(number_format($item->total_price)); ?> تومان</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <td class="text-center" colspan="5">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            <?php endif; ?>
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php echo e($vouchers->links('admin.components.pagination')); ?>

                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/analytics/index-voucher.blade.php ENDPATH**/ ?>