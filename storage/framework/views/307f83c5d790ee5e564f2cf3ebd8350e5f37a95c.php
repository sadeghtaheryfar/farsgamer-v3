<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'قرعه کشی','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'قرعه کشی','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
ً
    <div class="content d-flex flex-column-fluid" >
        <div class="container">
			<div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                           <button wire:click="$set('tab','orders')" class="btn btn-primary">سفارش ها</button>
						   <button wire:click="$set('tab','users')" class="btn btn-primary">کاربران</button>
                        </div>
					
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'tracking_code','label' => 'کد سفارش','wire:model' => 'filterTrackingCode']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'tracking_code','label' => 'کد سفارش','wire:model' => 'filterTrackingCode']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.input','data' => ['type' => 'text','id' => 'user_mobile','label' => 'موبایل کاربر','wire:model' => 'filterUserMobile']]); ?>
<?php $component->withName('admin.forms.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'text','id' => 'user_mobile','label' => 'موبایل کاربر','wire:model' => 'filterUserMobile']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
						 <div class="col-md-4 col-sm-12">
                          	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.date-picker','data' => ['id' => 'start_at','label' => 'از تاریخ','wire:model' => 'start_at']]); ?>
<?php $component->withName('admin.forms.date-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'start_at','label' => 'از تاریخ','wire:model' => 'start_at']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.date-picker','data' => ['id' => 'end_at','label' => 'تا تاریخ','wire:model' => 'end_at']]); ?>
<?php $component->withName('admin.forms.date-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'end_at','label' => 'تا تاریخ','wire:model' => 'end_at']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
                        </div>
						
                    </div>
                </div>
            </div>
			<?php if($tab == 'users'): ?>
			<div class="row">
				<div class="col-xl-4">
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

									<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><p> <?php echo e($lottey_users); ?></p></span>
									<span class="font-weight-bold text-dark font-size-sm">تعداد شرکت کنندگان</span>
								</div>
						</div>
				</div>	
				<div class="col-xl-4">
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

									<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><p> <?php echo e(($users[0]->username ?? $users[0]->mobile ) .' : '.$users[0]->details_count); ?></p></span>
									<span class="font-weight-bold text-dark font-size-sm">بیشترین سفارش</span>
								</div>
						</div>
				</div>	
				<div class="col-xl-4">
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

									<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><p> <?php echo e($chance); ?></p></span>
									<span class="font-weight-bold text-dark font-size-sm">بیشترین شانس</span>
								</div>
						</div>
				</div>	
			</div>
			<?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('admin.components.advanced-table', ['searchAble' => false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					<?php if($tab == 'orders'): ?>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
                                <th>محصول</th>
								<th>امتیاز</th>
                                <th>وضعیت</th>
                                <th>تعداد</th>
                                <th>مبلغ</th>
								<th>شماره کاربر</th>
                                <th>تاریخ</th>
                               
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
									 <td><?php echo e($item->product->lottery*$item->quantity); ?></td>
                                    <td><span style="background-color:<?php echo e($label[$item->status]); ?> ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);"><?php echo e($item->status_label); ?></span></td>
                                   
									<td><?php echo e($item->quantity); ?></td>
                                    <td><?php echo e(number_format($item->price)); ?> تومان</td>
									<td><?php echo e($item->order->user->mobile); ?></td>
                                    <td><?php echo e(jalaliDate($item->order->created_at)); ?></td>
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

					<?php elseif($tab == 'users'): ?>

					<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>شماره</th>
                                <th>تعداد سفارش</th>
                                <th>شانش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e(iteration($loop, $perPage)); ?></td>
                                    <td><?php echo e($item->name.' '.$item->family); ?></td>
									<td><?php echo e($item->mobile); ?></td>
									<td><?php echo e($item->details_count); ?></td>
									<td><?php echo e($item->lotteries($start_at, $end_at)); ?></td>
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
					 <?php echo e($users->links('admin.components.pagination')); ?>

					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/lotteries/index-lottery.blade.php ENDPATH**/ ?>