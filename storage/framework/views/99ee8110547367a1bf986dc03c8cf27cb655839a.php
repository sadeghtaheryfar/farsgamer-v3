<div wire:poll.40s = "updateTime()" class="overflow-hidden">

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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.form','data' => ['title' => 'سفارش ('.e($model->order->tracking_code).')','mode' => $mode]]); ?>
<?php $component->withName('admin.forms.form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => 'سفارش ('.e($model->order->tracking_code).')','mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mode)]); ?>
							<div class="form-group col-4">
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
									<div class="form-group col-12">
										<p><a href="<?php echo e(route('admin.users.store', ['action'=>'edit', 'id' => $model->order->user_id])); ?>">پروفایل کاربر</a></p>
										<p><a href="<?php echo e(route('admin.orders', ['filterUserMobile'=>$model->order->mobile])); ?>">سفارشات کاربر</a></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>نام : <?php echo e($model->order->name ?? ''); ?></p>
									</div>
									
									<div class="form-group col-12 m-0">
										<p>نام خانوادگی : <?php echo e($model->order->family ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>موبایل : <?php echo e($model->order->mobile ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>ایمیل : <?php echo e($model->order->email ?? ''); ?></p>
									</div>
									
								</div>
								<button class="btn btn-danger" type="button" onclick="deleteItem(<?php echo e($model->id); ?>)">حدف سفارش</button>
							</div>
							<div class="form-group col-4">
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
									<div class="form-group col-12 m-0">
										<p>استان : <?php echo e($model->order->province ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>شهر : <?php echo e($model->order->city ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>کد پستی : <?php echo e($model->order->postalCode ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>ادرس : <?php echo e($model->order->address ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>توضیحات : <?php echo e($model->order->description ?? ''); ?></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>آی پی : <?php echo e($model->order->user_ip ?? ''); ?></p>
									</div>
								</div>
							</div>
							<div class="form-group col-4">
								<div class="row">
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
									<div class="form-group col-12 m-0">
										<p>مجموع : <?php echo e(number_format($model->order->price ?? 0)); ?> تومان</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>تخفیف : <?php echo e(number_format($model->order->discount ?? 0)); ?> تومان</p>
										<p>کد تخفیف : <?php echo e($model->order->voucher->code ?? ''); ?> (<?php echo e(number_format($model->order->voucher_amount)); ?> تومان)</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>کیف پول : <?php echo e(number_format($model->order->wallet_pay ?? 0)); ?> تومان</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>
											<span>جمع کل فاکتور : <?php echo e(number_format($model->order->total_price ?? 0)); ?> تومان</span>
											<span>برای <?php echo e($model->order->details()->count()); ?> محصول</span>
										</p>
									</div>
									<div class="form-group col-12 m-0">
										<?php if($payment): ?>
											<p>درگاه : <?php echo e($payment->payment_gateway); ?> (<?php echo e(jalaliDate($payment->updated_at)); ?>)</p>
											<p>کد پیگیری درگاه : <?php echo e($payment->payment_ref); ?></p>
										<?php endif; ?>
									
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

							<div class="form-group col-4 p-3 bg-secondary">
								نام : <?php echo e($model->product->title); ?>

							</div>
							<div class="form-group col-5 p-3 bg-secondary">
								وضعیت : <?php echo e($model->status_label); ?>

							</div>
							<div class="form-group col-1 p-3 bg-secondary">
								تعداد : <?php echo e($model->quantity); ?>

							</div>
							<div class="form-group col-2 p-3 bg-secondary">
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
												<?php if( $hash === true): ?>
													<?php echo e(base64_encode($license)); ?>

												<?php else: ?>
													<?php echo e(($license)); ?>

												<?php endif; ?>
											</div>
											

										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php endif; ?>
								</div>
							</div>
						
						<div class="form-group col-12">
							<button class="btn btn-info" onclick="crackHash()">باز کردن قفل لایسنس ها</button>
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
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'note','label' => 'متن پیامک','rows' => '5','wire:model.defer' => 'orderSms']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note','label' => 'متن پیامک','rows' => '5','wire:model.defer' => 'orderSms']); ?>
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
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
							<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.dropdown','data' => ['id' => 'note_type','label' => 'نوع یادداشت','options' => ['0'=>'خصوصی', '1'=>'عمومی'],'wire:model.defer' => 'noteType']]); ?>
<?php $component->withName('admin.forms.dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'note_type','label' => 'نوع یادداشت','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['0'=>'خصوصی', '1'=>'عمومی']),'wire:model.defer' => 'noteType']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.admin.forms.textarea','data' => ['id' => 'sms','label' => 'ارسال پیامک جداگانه','rows' => '5','wire:model.defer' => 'sendSms']]); ?>
<?php $component->withName('admin.forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'sms','label' => 'ارسال پیامک جداگانه','rows' => '5','wire:model.defer' => 'sendSms']); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
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

<?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/orders/store-order2.blade.php ENDPATH**/ ?>