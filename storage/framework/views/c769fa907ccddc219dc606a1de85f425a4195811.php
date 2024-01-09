<div>
     <div id="kt_subheader" class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5">لایسنس ها</h5>
                
            </div>
        </div>
    </div>
</div>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>دسته بندی</th>
								
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td>
										
										<h2 class="text-info"><?php echo e($key); ?></h2>
										
									</td>
									<td>
										<tr>
											<th>#</th>
											<th>محصول</th>
											<th>تعداد</th>
										</tr>
										<?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e(iteration($loop, $perPage)); ?></td>
											<td><?php echo e($value->title); ?></td>
											<td class="<?php echo e(($codes[$value->id] ?? 0) == 0 ? 'text-danger' : ''); ?>"><?php echo e($codes[$value->id] ?? 0); ?></td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</td>
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
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/products/index-license.blade.php ENDPATH**/ ?>