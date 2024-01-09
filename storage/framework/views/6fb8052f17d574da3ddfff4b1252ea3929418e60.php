
<div class="overflow-hidden" wire:poll.40s = "updateTime()">
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
						<?php if($allow == true): ?>
						<?php $__env->startPush('scripts'); ?>
						<script>
							Swal.fire({
								title: '<?php echo e(auth()->user()->translate('اخطار')); ?>',
								text: 'هم اکنون <?php echo e($user_in_order ?? 'شخص دیگری'); ?> در حال ویرایش این سفارش می باشد(This order is currently being edited by <?php echo e($user_in_order ?? 'شخص دیگری'); ?>)',
								icon: 'warning',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								cancelButtonText: 'خیر',
								confirmButtonText: 'ok'
							}).then((result) => {
								if (result.value) {
								// window.livewire.find('<?php echo e($_instance->id); ?>').call('', '')
								}
							})
						</script>
						<?php $__env->stopPush(); ?>
						<?php endif; ?> 
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => ''.e(auth()->user()->translate('سفارش')).'(<span class=\'copy_text\'>'.e($model->order->tracking_code).'</span>)','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('سفارش')).'(<span class=\'copy_text\'>'.e($model->order->tracking_code).'</span>)','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
							
							<?php if(!auth()->user()->hasRole('پشتیبان محصول')): ?>
							<div class="form-group col-4">
								<div class="row">
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => ''.e(auth()->user()->translate('اطلاعات کاربر')).'']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('اطلاعات کاربر')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
									<div class="form-group col-12">
										<p><a href="<?php echo e(route('admin.users.store', ['action'=>'edit', 'id' => $model->order->user_id])); ?>"><?php echo e(auth()->user()->translate('پروفایل کاربر')); ?></a></p>
										<p><a href="<?php echo e(route('admin.orders', ['filterUserMobile'=>$model->order->mobile])); ?>"><?php echo e(auth()->user()->translate('سفارشات کاربر')); ?></a></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('نام')); ?> : <?php echo e(auth()->user()->fingilish($model->order->name ?? '')); ?></p>
									</div>
									
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('نام خانوادگی')); ?> : <?php echo e(auth()->user()->fingilish($model->order->family ?? '')); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('موبایل')); ?> : <?php echo e($model->order->mobile ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('ایمیل')); ?> : <?php echo e($model->order->email ?? ''); ?></p>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="form-group col-4">
								<div class="row">
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => ''.e(auth()->user()->translate('اطلاعات کاربر')).'']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('اطلاعات کاربر')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('استان')); ?> : <?php echo e(auth()->user()->fingilish($model->order->province ?? '')); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('شهر')); ?> : <?php echo e(auth()->user()->fingilish($model->order->city ?? '')); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('کد پستی')); ?> : <?php echo e($model->order->postalCode ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('آدرس')); ?> : <?php echo e($model->order->address ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('توضیحات')); ?>  : <?php echo e($model->order->description ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('آی پی')); ?> : <?php echo e($model->order->user_ip ?? ''); ?></p>
									</div>
								</div>
							</div>
							<div class="form-group col-4">
								<div class="row">
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => ''.e(auth()->user()->translate('اطلاعات پرداخت')).'']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('اطلاعات پرداخت')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('مجموع')); ?> : <?php echo e(number_format($model->order->price ?? 0)); ?> <?php echo e(auth()->user()->translate('تومان')); ?> </p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('تخفیف')); ?> : <?php echo e(number_format($model->order->discount ?? 0)); ?> <?php echo e(auth()->user()->translate('تومان')); ?></p>
										<p><?php echo e(auth()->user()->translate('کد تخفیف')); ?> : <?php echo e($model->order->voucher->code ?? ''); ?> (<?php echo e(number_format($model->order->voucher_amount)); ?> <?php echo e(auth()->user()->translate('تومان')); ?>)</p>
									</div>
									<div class="form-group col-12 m-0">
										<p><?php echo e(auth()->user()->translate('کیف پول')); ?> : <?php echo e(number_format($model->order->wallet_pay ?? 0)); ?> <?php echo e(auth()->user()->translate('تومان')); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>
											<span><?php echo e(auth()->user()->translate('جمع کل فاکتور')); ?> : <?php echo e(number_format($model->order->total_price ?? 0)); ?> <?php echo e(auth()->user()->translate('تومان')); ?></span>
											<span><?php echo e(auth()->user()->translate('برای')); ?> : 
											<span> <?php echo e($model->order->details()->count()); ?> <?php echo e(auth()->user()->translate('محصول')); ?></span>
										</p>
									</div>
									<div class="form-group col-12 m-0">
									
									
									</div>
								</div>
							</div>
							<?php endif; ?>
							
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => ''.e(auth()->user()->translate('محصولات')).'']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('محصولات')).'']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
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
							<div class="form-group col-6 p-3 bg-light">
								<?php echo e(auth()->user()->translate('نام')); ?> : <?php echo e(auth()->user()->translate($model->product->title)); ?>

							</div>
							<div class="form-group col-6 p-3 bg-light">
								 
								<span style="background-color:<?php echo e($label[$model->status]); ?> ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);"><?php echo e(auth()->user()->translate('وضعیت')); ?> : <?php echo e(auth()->user()->translate($model->status_label)); ?> </span>
							</div>
							<div class="form-group col-6 p-3 bg-light">
								<?php echo e(auth()->user()->translate('تعداد')); ?> : <?php echo e($model->quantity); ?>

							</div>
							<div class="form-group col-6 p-3 bg-light">
								<?php echo e(auth()->user()->translate('مبلغ')); ?> :<?php echo e(number_format($model->price)); ?> <?php echo e(auth()->user()->translate('تومان')); ?>

							</div>
								<?php if($payment): ?>
									<p>درگاه : <?php echo e($payment->payment_gateway); ?> (<?php echo e(jalaliDate($payment->updated_at)); ?>)</p>
									<p>کد پیگیری درگاه : <?php echo e($payment->payment_ref); ?></p>
								<?php endif; ?>
							<div class="form-group col-12">
								<?php if(sizeof($model->form) > 0): ?>
									<div class="row">
										<div class="form-group col-12 d-flex justify-content-between">
											<div><?php echo e(auth()->user()->translate('فرم')); ?></div>
										</div>
										<?php $__currentLoopData = $model->form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $form): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(($form['type'] ?? '') != 'paragraph'): ?>
												<div class="form-group col-4">
													<td > <?php echo e(auth()->user()->translate(trim(strip_tags($form['label'])))); ?> </td>
												</div>
												<div class="form-group col-6  p-0 m-0 ">
													<span class="copy_text p-0 m-0">
														<?php echo e(auth()->user()->translate($form['value'] ?? '')); ?>

													</span>
												</div>
												<div class="form-group col-2">
													<td><?php echo e(number_format(($form['price'] ?? 0) * $model->quantity)); ?> <?php echo e(auth()->user()->translate('تومان')); ?></td>
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
											<div><?php echo e(auth()->user()->translate('لایسنسیس')); ?></div>
											
											
											
											
										</div>
										<?php $__currentLoopData = $model->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<div oncopy="copy('<?php echo e($license); ?>')"  class="form-group col-12"  wire:ignore.self>
												
													<?php echo e(($license)); ?>

												
											</div>
											

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</div>
							</div>
						<div class="form-group col-12">
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '<?php echo e(\App\Models\Order::STATUS_HOLD); ?>')"><?php echo e(auth()->user()->translate('در انتظار بررسی توسط پشتیبانی')); ?> </button>
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '<?php echo e(\App\Models\Order::STATUS_PROCESSING); ?>')"><?php echo e(auth()->user()->translate('در حال انجام توسط تیم ثبت سفارشات')); ?> </button>
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '<?php echo e(\App\Models\Order::STATUS_STORE); ?>')"><?php echo e(auth()->user()->translate('درحال آماده سازی در انبار')); ?> </button>
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '<?php echo e(\App\Models\Order::STATUS_COMPLETED); ?>')"><?php echo e(auth()->user()->translate('تکمیل شده')); ?> </button>
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
					
					<div class="col-12 col-xl-4">
						<div class="content d-flex flex-column-fluid">
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => '']]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => '']); ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => ''.e(auth()->user()->translate('یادداشت ها')).'']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(auth()->user()->translate('یادداشت ها')).'']); ?>
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
										<?php if(auth()->user()->hasRole('پشتیبان محصول') && $item->is_user_note): ?>
											<?php continue; ?>
										<?php endif; ?>
										<tr >
											
											<td class="py-2">
											<?php echo e($item->user->full_name ?? auth()->user()->translate('سیستم')); ?> : 
											
												<?php echo (nl2br($item->note)); ?>

											
											
											<p class="mt-2">
												<?php echo e(auth()->user()->translate('در تاریخ')); ?> <?php echo e(auth()->user()->language == 'basic' ? jalaliDate($item->created_at) : $item->created_at); ?>

											</p>
											<div class="d-flex justify-content-between my-2">
												<?php if(@!$item->trashed()): ?>
													<button wire:click="deleteNote(<?php echo e($key); ?>)" class="btn btn-light-danger font-weight-bolder btn-sm"><?php echo e(auth()->user()->translate('حذف یادداشت')); ?></button>
													
												<?php endif; ?>
												<?php if($item->trashed()): ?>
													
													<span class="label label-lg label-light-danger label-inline"><?php echo e(auth()->user()->translate('حذف شده')); ?></span>
											
												<?php else: ?>
													<P>
													<?php echo $item->is_user_note ?
													'<span class="label label-lg label-light-primary label-inline">'.auth()->user()->translate('عمومی').'</span>' :
													'<span class="label label-lg label-light-warning label-inline">'.auth()->user()->translate('خصوصی').'</span>'; ?>

													</p>
													
												<?php endif; ?>
												
											</div>
											
											</td>
											
											
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<td class="text-center" colspan="6">
										<?php echo e(auth()->user()->translate('دیتایی جهت نمایش وجود ندارد')); ?>

											
										</td>
									<?php endif; ?>
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'note','label' => ''.e(auth()->user()->translate('یادداشت')).'','rows' => '5','wire:model.defer' => 'sendNote']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note','label' => ''.e(auth()->user()->translate('یادداشت')).'','rows' => '5','wire:model.defer' => 'sendNote']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							
							<div class="form-group col-12">
								<button class="btn btn-success" wire:click="sendNote"><?php echo e(auth()->user()->translate('ثبت')); ?></button>
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
				
				</div>
				

			
			</div>
<?php $__env->startPush('scripts'); ?>
    <script>
		function copy(text)
		{
			window.livewire.find('<?php echo e($_instance->id); ?>').call('copyLicenses',text)
		}
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف سفارش!',
                text: 'آیا از حذف سفارش اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                window.livewire.find('<?php echo e($_instance->id); ?>').call('deleteOrder', id)
                }
            })
        }


		Livewire.on('verify-code', data => {
			Swal.fire({
				title: 'کد ارسال شده را وارد نمایید',
				input: 'password',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'بررسی',
				showLoaderOnConfirm: true,
				preConfirm: (login) => {
					window.livewire.find('<?php echo e($_instance->id); ?>').call('checkCode',login)
				},
				allowOutsideClick: () => !Swal.isLoading()
				}).then((result) => {
			})
    	})

		function crackHash()
		{
			Swal.fire({
			title: 'گذرواژه را وارد نمایید',
			input: 'password',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			confirmButtonText: 'بررسی',
			showLoaderOnConfirm: true,
			preConfirm: (login) => {
				window.livewire.find('<?php echo e($_instance->id); ?>').call('checkPassword',login)
			},
			allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
			})
		}

			const span = document.querySelectorAll(".copy_text");

			span.forEach(myFunction);

			
			
			function myFunction(item, index) {
				

				item.onclick = function() {
					document.execCommand("copy");
				}
			
				item.addEventListener("copy", function(event) {
				event.preventDefault();
				if (event.clipboardData) {
					event.clipboardData.setData("text/plain", item.textContent.replace(/^\s+|\s+$/gm,''));
					
					Swal.fire({
					toast: true,
					title: 'کپی شد',
					icon: 'success',
					position: 'bottom-start',
					showConfirmButton: false,
					timer: 4000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
				})
				}
				});
			}
			
		
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/products/store-product-order.blade.php ENDPATH**/ ?>