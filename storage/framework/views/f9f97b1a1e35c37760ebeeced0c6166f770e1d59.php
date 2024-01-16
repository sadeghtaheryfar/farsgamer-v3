<div wire:init="emitEvent()">
<?php if(Auth::user()->hasRole('super_admin') || (Auth::user()->hasRole('مدیر محصول')  )): ?>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<h5 class="text-dark font-weight-bold my-1 mr-5"><?php echo e(auth()->user()->translate('داشبورد')); ?></h5>
									</div>
								</div>
	
							</div>
						</div>
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="row">
								
									<div class="col-xl-12">
										<div class="card card-custom gutter-b example example-compact">
										
											
												
												<div class="d-flex align-items-center py-3">
												<!--begin::Actions-->
												<div class="d-flex align-center justify-content-between">
													<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.date-picker','data' => ['id' => 'date','label' => 'از ','wire:model' => 'from_date']]); ?>
<?php $component->withName('admin.forms.date-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'date','label' => 'از ','wire:model' => 'from_date']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
												</div>
													<div>
														<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.date-picker','data' => ['id' => 'date2','label' => 'تا','wire:model' => 'to_date']]); ?>
<?php $component->withName('admin.forms.date-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'date2','label' => 'تا','wire:model' => 'to_date']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
													</div>
													
												<!--end::Actions-->
												</div>
												
											
										</div>
									</div>	
									
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo e((count($allOrders))); ?></span>
													<span class="font-weight-bold text-dark font-size-sm"><?php echo e(auth()->user()->translate('تعداد سفارش ها')); ?></span>
												</div>
											</div>
										</div>	
										<?php if(Auth::user()->hasRole('super_admin')): ?>
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo e(number_format($allPayments)); ?> تومان</span>
													<span class="font-weight-bold text-dark font-size-sm">جمع کل مبالغ پرداخت شده</span>
												</div>
											</div>
										</div>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo e(number_format($reductionAmount)); ?> تومان</span>
													<span class="font-weight-bold text-dark font-size-sm">جمع کل مبالغ تخفیف خورده</span>
												</div>
											</div>
										</div>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo e(number_format($walletAmount)); ?> تومان</span>
													<span class="font-weight-bold text-dark font-size-sm">جمع کل مبالغ  کیف پول</span>
												</div>
											</div>
										</div>	
										<?php endif; ?>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo e((($onHoldOrders))); ?></span>
													<span class="font-weight-bold text-dark font-size-sm"><?php echo e(auth()->user()->translate('سفارشات در حال بررسی توسط پشتیبانی')); ?> </span>
												</div>
											</div>
										</div>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><?php echo e((($refundedOrders))); ?></span>
					<span class="font-weight-bold text-dark font-size-sm"><?php echo e(auth()->user()->translate('شفارشات مسترد شده')); ?></span>
												</div>
											</div>
										</div>			
								</div>
							</div>				
						</div>
						
						<div class="d-flex flex-column-fluid">
							<div class="container">
							 <div class="row" wire:ignore>
								<div class="col-xl-12">
									<!--begin::Charts Widget 4-->
									<div class="card card-custom card-stretch gutter-b">
										<!--begin::Header-->
										<div class="card-header h-auto border-0">
											<div class="card-title py-5">
												<h3 class="card-label">
													<span class="d-block text-dark font-weight-bolder"><?php echo e(auth()->user()->translate('گردش مالی')); ?></span>
												</h3>
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<div id="kt_charts_widget_4_chart2"></div>
										</div>
										<!--end::Body-->
									</div>
									<!--end::Charts Widget 4-->
								</div>
							</div>
								<div class="row">
									<div class="col-xl-12">
										<!--begin::Base Table Widget 2-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark"><?php echo e(auth()->user()->translate('پرفروش ترین محصولات')); ?></span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0 mt-n3">
												<div class="tab-content mt-5" id="myTabTables2">
													
														<div class="table-responsive">
															<table class="table table-striped">
																<thead>
																<tr>
																	<th>#</th>
																	
																	<th><?php echo e(auth()->user()->translate('عنوان')); ?></th>
																	<th><?php echo e(auth()->user()->translate('تعداد')); ?></th>
																	
																</tr>
																</thead>
																<tbody>
															
																<?php $__empty_1 = true; $__currentLoopData = $most_sold_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
																	<tr>
																		<td><?php echo e(iteration($loop, $perPage)); ?></td>
																		<td><a href="<?php echo e(route('products.show', $item['title'] )); ?>"><?php echo e(auth()->user()->translate($item->title)); ?></a></td>
																	
																		<td><?php echo e(($item->details_count)); ?></td>
																			<td></td>
																	</tr>
																
																	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
																	<td class="text-center" colspan="8">
																	<?php echo e(auth()->user()->translate('دیتایی جهت نمایش وجود ندارد')); ?>

																		
																	</td>
                            										<?php endif; ?>
																</tbody>
															</table>
														</div>
													
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Base Table Widget 2-->
									</div>
								</div>
							</div>	
						</div>
						
	</div>
<?php endif; ?>
</div><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/admin/dashboards/index-dashboard.blade.php ENDPATH**/ ?>