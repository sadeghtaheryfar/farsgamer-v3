<div wire:poll.40s = "updateTime()" class="overflow-hidden">
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.subheader','data' => ['title' => 'سفارش','mode' => $mode,'create' => false]]); ?>
<?php $component->withName('admin.subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode),'create' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
						</div>
						<?php if($allow == true): ?>
						<?php $__env->startPush('scripts'); ?>
						<script>
							Swal.fire({
								title: ' اخطار!',
								text: 'هم اکنون <?php echo e($user_in_order ?? 'شخص دیگری'); ?> در حال ویرایش این سفارش می باشد',
								icon: 'warning',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								cancelButtonText: 'خیر',
								confirmButtonText: 'باشه'
							}).then((result) => {
								if (result.value) {
								// window.livewire.find('<?php echo e($_instance->id); ?>').call('', '')
								}
							})
						</script>
						<?php $__env->stopPush(); ?>
						<?php endif; ?> 
						<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => 'سفارش (<span class=\'copy_text\'>'.e($model->order->tracking_code).'</span>)','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش (<span class=\'copy_text\'>'.e($model->order->tracking_code).'</span>)','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
						<?php if(auth()->user()->hasPermissionTo('show_order_details')): ?>
							<div class="form-group col-12">
								<div class="row">
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'اطلاعات کاربر']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'اطلاعات کاربر']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
									<table class="table table-striped table-bordered">
										<thead>
										<tr>
											<td>پروفایل کاربری</td>
											<td>سفارشات کاربر</td>
											<td>نام</td>
											<td>نام خانوادگی</td>
											<td>شماره همراه</td>
											<td>ایمیل</td>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><a href="<?php echo e(route('admin.users.store', ['action'=>'edit', 'id' => $model->order->user_id])); ?>">مشاهده</a></td>
											<td><a href="<?php echo e(route('admin.orders', ['filterUserMobile'=>$model->order->mobile])); ?>">مشاهده</a></td>
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
									<?php if($model->file): ?>
									<div class="col-12">
										<img src="<?php echo e(asset('media/'.$model->file)); ?>" style="width:200px;height:200px">
									</div>
									<?php endif; ?>
								
									<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'اطلاعات پرداخت']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'اطلاعات پرداخت']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
									<?php if($model->cart_data): ?>
										<div class="col-12">
											<table class="table table-striped table-bordered">
												<thead>
												<tr>
													<td>شماره کارت:</td>
													<td>مبلغ خریداری شده</td>
													
												</tr>
												</thead>
												<tbody>
												<tr>
													<td><?php echo e($model->cart_data['cart']['cart_number']); ?></td>
													<td><?php echo e($model->cart_data['form_selected']['value']); ?></td>
												</tr>
												</tbody>
											</table>
										</div>
									<?php endif; ?>
									<div class="col-12">
										<table class="table table-striped table-bordered">
											<thead>
											<tr>
												<td>کد تخفیف:</td>
												<td>بابت کد تخفیف:</td>
												<td>تخفیف محصولات:</td>
												<td>تخفیف کل:</td>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td><?php echo e($model->order->voucher->code ?? ''); ?></td>
												<td><?php echo e(number_format($model->order->voucher_amount)); ?> تومان </td>
												<td><?php echo e(number_format($model->order->discount ?? 0)); ?> تومان </td>
												<td><?php echo e(number_format( ($model->order->discount ?? 0) + ($model->order->voucher_amount ?? 0) )); ?> تومان </td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								
								<button class="btn btn-danger" type="button" onclick="deleteItem(<?php echo e($model->id); ?>)"><i class="fa fa-trash"></i> حدف سفارش</button>
							</div>
							<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'محصولات']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'محصولات']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

							<div class="form-group col-4 p-3 bg-light">
								نام : <?php echo e($model->product->title); ?>

							</div>
							<div class="form-group col-5 p-3 bg-light">
								وضعیت : <?php echo e($model->status_label); ?>

							</div>
							<div class="form-group col-1 p-3 bg-light">
								تعداد : <?php echo e($model->quantity); ?>

							</div>
							<div class="form-group col-2 p-3 bg-light">
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
														<?php if(isset($form['inserted_value'])): ?>
													 		<?php echo e($form['inserted_value'] ?? ''); ?>

														<?php elseif(isset($form['value'])): ?> 
															<?php echo e($form['value'] ?? ''); ?>

														<?php endif; ?>
													</span>
												</div>
												<div class="form-group col-2">
														<?php if(isset($form['inserted_price'])): ?>
															 <td><?php echo e(number_format(($form['inserted_price'] ?? 0) * $model->quantity)); ?> تومان</td>
														<?php else: ?>
															<td><?php echo e(number_format(($form['price'] ?? 0) * $model->quantity)); ?> تومان</td>
														<?php endif; ?>
													
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
												<?php if( $hash === true): ?>
													<?php echo e(base64_encode($license)); ?>

												<?php else: ?>
													<?php echo e(($license)); ?>

												<?php endif; ?>
											</div>
											

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<div class="form-group col-12"  wire:ignore.self>
											<button class="btn btn-primary" wire:loading.attr="disabled" onclick="getNumber()">ارسال مجدد لایسنس</button>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php if(auth()->user()->hasPermissionTo('edit_orders')): ?>	
						
						<div class="form-group col-12"  wire:ignore.self>
							<button class="btn btn-primary" onclick="crackHash()">باز کردن قفل لایسنس ها</button>
						</div>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'type','label' => 'وضعیت سفارش','options' => [
						\App\Models\Order::STATUS_HOLD => 'در انتظار بررسی توسط پشتیبانی',
						\App\Models\Order::STATUS_SPEED_PLUS => 'اسپید پلاس',
						\App\Models\Order::STATUS_DELAY => 'تاخیر در انجام',
						\App\Models\Order::STATUS_PROCESSING => 'در حال انجام توسط تیم ثبت سفارشات',
						\App\Models\Order::STATUS_STORE => 'درحال آماده سازی در انبار',
						\App\Models\Order::STATUS_FAILED => 'در حال بررسی توسط مشتری',
						\App\Models\Order::STATUS_POST => 'ارسال توسط پست',
						\App\Models\Order::STATUS_CANCELLED => 'در انتظار بازگشت وجه',
						\App\Models\Order::STATUS_REFUNDED => 'مسترد شده',
						\App\Models\Order::STATUS_COMPLETED => 'تکمیل شده',
						\App\Models\Order::STATUS_BREAKED => 'لغو شده',
					],'required' => 'true','wire:model' => 'orderStatus']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'type','label' => 'وضعیت سفارش','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([
						\App\Models\Order::STATUS_HOLD => 'در انتظار بررسی توسط پشتیبانی',
						\App\Models\Order::STATUS_SPEED_PLUS => 'اسپید پلاس',
						\App\Models\Order::STATUS_DELAY => 'تاخیر در انجام',
						\App\Models\Order::STATUS_PROCESSING => 'در حال انجام توسط تیم ثبت سفارشات',
						\App\Models\Order::STATUS_STORE => 'درحال آماده سازی در انبار',
						\App\Models\Order::STATUS_FAILED => 'در حال بررسی توسط مشتری',
						\App\Models\Order::STATUS_POST => 'ارسال توسط پست',
						\App\Models\Order::STATUS_CANCELLED => 'در انتظار بازگشت وجه',
						\App\Models\Order::STATUS_REFUNDED => 'مسترد شده',
						\App\Models\Order::STATUS_COMPLETED => 'تکمیل شده',
						\App\Models\Order::STATUS_BREAKED => 'لغو شده',
					]),'required' => 'true','wire:model' => 'orderStatus']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>



						

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'note','label' => 'متن پیامک','rows' => '5','wire:model.defer' => 'orderSms']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note','label' => 'متن پیامک','rows' => '5','wire:model.defer' => 'orderSms']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
					 	<?php endif; ?>
							
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'سایر محصولات']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سایر محصولات']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>



						<div class="row">
							<?php $__currentLoopData = $model->order->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($detail->id == $model->id): ?>
									<?php continue; ?>
								<?php endif; ?>
								<div class="col-12 mt-3 p-4" style="border: 1px solid #eaeaea;border-radius: 10px;">
									<table class="table  table-bordered">
										<thead>
										<tr>
											<td>نام محصول:</td>
											<td>تعداد:</td>
											<td>هزینه :</td>
											<td>وضعیت:</td>
											<td>عملیات:</td>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><?php echo e($detail->product->title); ?></td>
											<td><?php echo e($detail->quantity); ?></td>
											<td><?php echo e(number_format($detail->price)); ?>تومان  </td>
											<td>
												<?php echo e($detail->status_label); ?>

											</td>
											<td>
												<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.edit-table','data' => ['href' => ''.e(route('admin.orders.store',
                                            ['action'=>'edit', 'id' => $detail->id])).'']]); ?>
<?php $component->withName('admin.edit-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['href' => ''.e(route('admin.orders.store',
                                            ['action'=>'edit', 'id' => $detail->id])).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>

						 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<div class="table-responsive">
								<table class="table">
									<tbody>
									<?php $__empty_1 = true; $__currentLoopData = $notes ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
												<?php if(!$item->trashed()): ?>
													<button wire:click="deleteNote(<?php echo e($key); ?>)" class="btn btn-light-danger font-weight-bolder btn-sm">حذف یادداشت</button>
													
												<?php endif; ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'note','label' => 'یادداشت','rows' => '5','wire:model.defer' => 'sendNote']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note','label' => 'یادداشت','rows' => '5','wire:model.defer' => 'sendNote']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'note_type','label' => 'نوع یادداشت','options' => ['0'=>'خصوصی', '1'=>'عمومی'],'wire:model.defer' => 'noteType']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note_type','label' => 'نوع یادداشت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['0'=>'خصوصی', '1'=>'عمومی']),'wire:model.defer' => 'noteType']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<div class="form-group col-12">
								<button class="btn btn-success" wire:click="sendNote">ثبت</button>
							</div>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.header','data' => ['title' => 'پیامک ها']]); ?>
<?php $component->withName('admin.forms.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'پیامک ها']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'sms','label' => 'ارسال پیامک جداگانه','rows' => '5','wire:model.defer' => 'sendSms']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sms','label' => 'ارسال پیامک جداگانه','rows' => '5','wire:model.defer' => 'sendSms']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
							<div class="form-group col-12">
								<button class="btn btn-success" wire:click="sendSms">ارسال پیامک</button>
							</div>
							

							

							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.separator','data' => []]); ?>
<?php $component->withName('admin.forms.separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
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
						</div>
					</div>
					<?php endif; ?>
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
		Livewire.on('verify-request', data => {
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
					window.livewire.find('<?php echo e($_instance->id); ?>').call('verifyRequest',login)
				},
				allowOutsideClick: () => !Swal.isLoading()
				}).then((result) => {
			})
    	})

		function crackHash()
		{
			Swal.fire({
			title: 'شماره همراه را وارد نمایید',
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


		function getNumber()
		{
			Swal.fire({
			title: 'شماره همراه را وارد نمایید',
			input: 'text',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			confirmButtonText: 'بررسی',
			showLoaderOnConfirm: true,
			preConfirm: (login) => {
				window.livewire.find('<?php echo e($_instance->id); ?>').call('getNumber',login)
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

<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/admin/orders/store-order.blade.php ENDPATH**/ ?>