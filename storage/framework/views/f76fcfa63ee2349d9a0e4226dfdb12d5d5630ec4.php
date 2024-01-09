<div  class="overflow-hidden">
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
	<div class="row">
    	<div class="col-12 col-xl-8">
			<div class="content d-flex flex-column-fluid">
					<div class="">

						<div>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.validation-errors','data' => []]); ?>
<?php $component->withName('admin.forms.validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						</div>
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => 'سفارش (<span class=\'copy_text\'>'.e($model->order->tracking_code).'</span>)','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش (<span class=\'copy_text\'>'.e($model->order->tracking_code).'</span>)','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
						
							<div class="form-group col-12">
								<div class="row">
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'اطلاعات کاربر']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'اطلاعات کاربر']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
									<table class="table table-striped table-bordered">
										<thead>
										<tr>
										
											<td>نام</td>
											<td>نام خانوادگی</td>
											<td>شماره همراه</td>
											<td>ایمیل</td>
										</tr>
										</thead>
										<tbody>
										<tr>
											
											<td><?php echo e($model->order->name ?? ''); ?></td>
											<td><?php echo e($model->order->family ?? ''); ?></td>
											<td><?php echo e($model->order->mobile ?? ''); ?></td>
											<td><?php echo e($model->order->email ?? ''); ?></td>
										</tr>
										
										</tbody>
									</table>
									<table  class="table table-striped table-bordered">
										<thead>
										<tr>
											<td>استان</td>
											<td>شهر</td>
											<td>کد پستی</td>
											<td>ای پی</td>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?php echo e($model->order->province ?? ''); ?></td>
											<td><?php echo e($model->order->city ?? ''); ?></td>
											<td><?php echo e($model->order->postalCode ?? ''); ?></td>
											<td><?php echo e($model->order->user_ip ?? ''); ?></td>
										</tr>
										
										</tbody>
									</table>
									<table  class="table table-striped table-bordered">
										<thead>
										<tr>
											<td>ادرس</td>
											<td>توضیحات</td>
											<td>تاریخ</td>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?php echo e($model->order->address ?? ''); ?></td>
											<td><?php echo e($model->order->description ?? ''); ?></td>
											<td><?php echo e(jalaliDate($model->order->created_at)); ?></td>
										</tr>
										
										</tbody>
									</table>
								
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'اطلاعات پرداخت']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'اطلاعات پرداخت']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
									<div class="col-12">
										<table class="table table-striped table-bordered">
											<thead>
											<tr>

												<td>هزینه کل:</td>
												<td>کیف پول :</td>
												<td>هزینه پرداخت شده:</td>
												<td>تعداد محصول:</td>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><?php echo e(number_format($model->order->price)); ?>تومان </td>
												<td><?php echo e(number_format($model->order->wallet_pay)); ?>تومان </td>
												<td><?php echo e(number_format($model->order->total_price)); ?> تومان </td>
												<td><?php echo e(number_format($model->order->details()->count())); ?> عدد </td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="col-12">
										<table class="table table-striped table-bordered">
											<thead>
											<tr>
												<td>کد پیگیری سفارش:</td>
												<td>درگاه پرداخت</td>
												<td>کد پیگیری درگاه </td>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><?php echo e($model->order->tracking_code); ?></td>
												<td><?php echo e($payment ? ( $payment->payment_gateway.' ('.jalaliDate($payment->updated_at).')' ) : ''); ?></td>
												<td><?php echo e($payment ? $payment->payment_ref : ''); ?></td>
											</tr>
											</tbody>
										</table>
									</div>
									<div class="col-12">
										<table class="table table-striped table-bordered">
											<thead>
											<tr>
											
												<td>تخفیف محصولات:</td>
												<td>تخفیف کل:</td>
											</tr>
											</thead>
											<tbody>
											<tr>
												
												<td><?php echo e(number_format($model->order->discount ?? 0)); ?> تومان </td>
												<td><?php echo e(number_format( ($model->order->discount ?? 0) + ($model->order->voucher_amount ?? 0) )); ?> تومان </td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								
								
							</div>
							
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'محصولات']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'محصولات']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

							<div class="form-group col-4 p-3 bg-info">
								نام : <?php echo e($model->product->title); ?>

							</div>
							<div class="form-group col-5 p-3 bg-info">
								وضعیت : <?php echo e($model->status_label); ?>

							</div>
							<div class="form-group col-1 p-3 bg-info">
								تعداد : <?php echo e($model->quantity); ?>

							</div>
							<div class="form-group col-2 p-3 bg-info">
								مبلغ :<?php echo e(number_format($model->price)); ?> تومان
							</div>

							<div class="form-group col-12">
								<?php if(sizeof($model->form) > 0): ?>
									<div class="row">
										<div class="form-group col-12 d-flex justify-content-between">
											<div>فرم</div>
										</div>
										<?php $__currentLoopData = $model->form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(($form['type'] ?? '') != 'paragraph'): ?>
												<div class="form-group col-4">
													<td ><?php echo $form['label'] ?? ''; ?></td>
												</div>
												<div class="form-group col-6  p-0 m-0 ">
													<span class="copy_text p-0 m-0">
													 <?php echo e($form['value'] ?? ''); ?>

													</span>
												</div>
												<div class="form-group col-2">
													<td><?php echo e(number_format(($form['price'] ?? 0) * $model->quantity)); ?> تومان</td>
												</div>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								<?php endif; ?>
							</div>
							
							<div class="form-group col-6"  wire:ignore.self>
								<div class="row" wire:ignore.self>
									<?php if($model->product->type == \App\Models\Product::TYPE_INSTANT_DELIVERY): ?>
										<div class="form-group col-12 d-flex justify-content-between" wire:ignore.self>
											<div>لایسنسیس</div>
											
											
											
											
										</div>
										<?php $__currentLoopData = $model->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<div oncopy="copy('<?php echo e($license); ?>')"  class="form-group col-12"  wire:ignore.self>
												
													<?php echo e(($license)); ?>

											
											</div>
											

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</div>
							</div>
						
							
							

						 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
					</div>
				</div>
					</div>
					<?php if(auth()->user()->hasPermissionTo('edit_orders')): ?>	
					<div class="col-12 col-xl-4">
						<div class="content d-flex flex-column-fluid">
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => '']]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => '']); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'یادداشت ها']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'یادداشت ها']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							<div class="table-responsive">
								<table class="table">
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $notes ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<?php if(!$item->is_user_note): ?>
											<?php continue; ?>
										<?php endif; ?>	
										<tr >
											
											<td class="py-2">
											<?php echo e($item->user->full_name ?? 'سیستم'); ?> : 
											<?php
												$code = stristr($item->note,'giftco');
												$code = explode("\n",$code)[0];
											?>
											<?php if($hash === true): ?>
												<?php echo (nl2br(str_replace($code,'*encoded*',$item->note))); ?>

											<?php else: ?>
												<?php echo (nl2br($item->note)); ?>

											<?php endif; ?>
											
											<p class="mt-2">
												در تاریخ <?php echo e(jalaliDate($item->created_at)); ?>

											</p>
											<div class="d-flex justify-content-between my-2">
												
												<?php if($item->trashed()): ?>
													
													<span class="label label-lg label-light-danger label-inline">حذف شده</span>
											
												<?php else: ?>
													<P>
													<?php echo $item->is_user_note ?
													'<span class="label label-lg label-light-primary label-inline">عمومی</span>' :
													'<span class="label label-lg label-light-warning label-inline">خصوصی</span>'; ?>

													</p>
													
												<?php endif; ?>
												
											</div>
											
											</td>
											
											
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<td class="text-center" colspan="6">
											دیتایی جهت نمایش وجود ندارد
										</td>
									<?php endif; ?>
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'پیامک ها']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'پیامک ها']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

							<div class="table-responsive">
								<table class="table">
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $sms ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<tr>
											
											<td style="max-width: 150px">
											<?php
												$code = stristr($item->message,'giftco');
												$code = explode("\n",$code)[0];
											?>
											<?php if($hash === true): ?>
												<?php echo (nl2br(str_replace($code,'*encoded*',$item->message))); ?>

											<?php else: ?>
												<?php echo (nl2br($item->message)); ?>

											<?php endif; ?>
											
											</td>
											
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<td class="text-center" colspan="3">
											دیتایی جهت نمایش وجود ندارد
										</td>
									<?php endif; ?>
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							
							

						
							

							

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							
							 <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
				

			
			</div>


<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/partner/orders/store-order.blade.php ENDPATH**/ ?>