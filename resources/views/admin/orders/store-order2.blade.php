<div wire:poll.40s = "updateTime()" class="overflow-hidden">

	<div class="row">
    	<div class="col-12 col-xl-8">
			<div class="content d-flex flex-column-fluid">
					<div class="">

						<div>
							<x-admin.forms.validation-errors/>
						</div>
						@if($allow == true)
						@push('scripts')
						<script>
							Swal.fire({
								title: ' اخطار!',
								text: 'هم اکنون {{$user_in_order ?? 'شخص دیگری'}} در حال ویرایش این سفارش می باشد',
								icon: 'warning',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								cancelButtonText: 'خیر',
								confirmButtonText: 'باشه'
							}).then((result) => {
								if (result.value) {
								// @this.call('', '')
								}
							})
						</script>
						@endpush
						@endif
						<x-admin.forms.form title="سفارش ({{$model->order->tracking_code}})" :mode="$mode" >
							<div class="form-group col-4">
								<div class="row">
									<x-admin.forms.header title="اطلاعات کاربر"/>
									<div class="form-group col-12">
										<p><a href="{{route('admin.users.store', ['action'=>'edit', 'id' => $model->order->user_id])}}">پروفایل کاربر</a></p>
										<p><a href="{{route('admin.orders', ['filterUserMobile'=>$model->order->mobile])}}">سفارشات کاربر</a></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>نام : {{$model->order->name ?? ''}}</p>
									</div>
									
									<div class="form-group col-12 m-0">
										<p>نام خانوادگی : {{$model->order->family ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>موبایل : {{$model->order->mobile ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>ایمیل : {{$model->order->email ?? ''}}</p>
									</div>
									
								</div>
								<button class="btn btn-danger" type="button" onclick="deleteItem({{$model->id}})">حدف سفارش</button>
							</div>
							<div class="form-group col-4">
								<div class="row">
									<x-admin.forms.header title="اطلاعات کاربر"/>
									<div class="form-group col-12 m-0">
										<p>استان : {{$model->order->province ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>شهر : {{$model->order->city ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>کد پستی : {{$model->order->postalCode ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>ادرس : {{$model->order->address ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>توضیحات : {{$model->order->description ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>آی پی : {{$model->order->user_ip ?? ''}}</p>
									</div>
								</div>
							</div>
							<div class="form-group col-4">
								<div class="row">
									<x-admin.forms.header title="اطلاعات پرداخت"/>
									<div class="form-group col-12 m-0">
										<p>مجموع : {{number_format($model->order->price ?? 0)}} تومان</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>تخفیف : {{number_format($model->order->discount ?? 0)}} تومان</p>
										<p>کد تخفیف : {{$model->order->voucher->code ?? ''}} ({{number_format($model->order->voucher_amount)}} تومان)</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>کیف پول : {{number_format($model->order->wallet_pay ?? 0)}} تومان</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>
											<span>جمع کل فاکتور : {{number_format($model->order->total_price ?? 0)}} تومان</span>
											<span>برای {{$model->order->details()->count()}} محصول</span>
										</p>
									</div>
									<div class="form-group col-12 m-0">
										@if($payment)
											<p>درگاه : {{$payment->payment_gateway}} ({{jalaliDate($payment->updated_at)}})</p>
											<p>کد پیگیری درگاه : {{$payment->payment_ref}}</p>
										@endif
									
									</div>
								</div>
							</div>

							<x-admin.forms.separator/>
							<x-admin.forms.header title="محصولات"/>

							<div class="form-group col-4 p-3 bg-secondary">
								نام : {{$model->product->title}}
							</div>
							<div class="form-group col-5 p-3 bg-secondary">
								وضعیت : {{$model->status_label}}
							</div>
							<div class="form-group col-1 p-3 bg-secondary">
								تعداد : {{$model->quantity}}
							</div>
							<div class="form-group col-2 p-3 bg-secondary">
								مبلغ :{{number_format($model->price)}} تومان
							</div>

							<div class="form-group col-12">
								@if(sizeof($model->form) > 0)
									<div class="row">
										<div class="form-group col-12 d-flex justify-content-between">
											<div>فرم</div>
										</div>
										@foreach($model->form as $form)
											@if(($form['type'] ?? '') != 'paragraph')
												<div class="form-group col-4">
													<td >{!! $form['label'] ?? '' !!}</td>
												</div>
												<div class="form-group col-6  p-0 m-0 ">
													<span class="copy_text p-0 m-0">
													 {{$form['value'] ?? ''}}
													</span>
												</div>
												<div class="form-group col-2">
													<td>{{number_format(($form['price'] ?? 0) * $model->quantity)}} تومان</td>
												</div>
											@endif
										@endforeach
									</div>
								@endif
							</div>
							
							<div class="form-group col-6"  wire:ignore.self>
								<div class="row" wire:ignore.self>
									@if($model->product->type == \App\Models\Product::TYPE_INSTANT_DELIVERY)
										<div class="form-group col-12 d-flex justify-content-between" wire:ignore.self>
											<div>لایسنسیس</div>
											{{--                                @if($model->quantity != sizeof($model->licenses) &&--}}
											{{--                                    $model->status != \App\Models\Order::STATUS_NOT_PAID)--}}
											{{--                                    <button class="btn btn-success" wire:click="completeLicenses()">کامل کردن لاینسیس ها</button>--}}
											{{--                                @endif--}}
										</div>
										@foreach($model->licenses as $license)
											
											<div oncopy="copy('{{$license}}')"  class="form-group col-12"  wire:ignore.self>
												@if( $hash === true)
													{{ base64_encode($license) }}
												@else
													{{ ($license) }}
												@endif
											</div>
											

										@endforeach
									@endif
								</div>
							</div>
						
						<div class="form-group col-12">
							<button class="btn btn-info" onclick="crackHash()">باز کردن قفل لایسنس ها</button>
						</div>
							<x-admin.forms.dropdown id="type" label="وضعیت سفارش" :options="[
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
					]" required="true" wire:model="orderStatus"/>
							<x-admin.forms.textarea id="note" label="متن پیامک" rows="5" wire:model.defer="orderSms"/>
					 		
							
							

						</x-admin.forms.form>
					</div>
				</div>
					</div>
					<div class="col-12 col-xl-4">
						<div class="content d-flex flex-column-fluid">
							<x-admin.forms.form title="" >
							<x-admin.forms.header title="یادداشت ها"/>
							<div class="table-responsive">
								<table class="table">
									<tbody>
									@forelse($notes ?? [] as $key => $item)
										<tr >
											
											<td class="py-2">
											{{$item->user->full_name ?? 'سیستم'}} : 
											@php
												$code = stristr($item->note,'giftco');
												$code = explode("\n",$code)[0];
											@endphp
											@if($hash === true)
												{!!  (nl2br(str_replace($code,'*encoded*',$item->note))) !!}
											@else
												{!! (nl2br($item->note)) !!}
											@endif
											
											<p class="mt-2">
												در تاریخ {{jalaliDate($item->created_at)}}
											</p>
											<div class="d-flex justify-content-between my-2">
												@if(!$item->trashed())
													<button wire:click="deleteNote({{$key}})" class="btn btn-light-danger font-weight-bolder btn-sm">حذف یادداشت</button>
													
												@endif
												@if($item->trashed())
													
													<span class="label label-lg label-light-danger label-inline">حذف شده</span>
											
												@else
													<P>
													{!! $item->is_user_note ?
													'<span class="label label-lg label-light-primary label-inline">عمومی</span>' :
													'<span class="label label-lg label-light-warning label-inline">خصوصی</span>' !!}
													</p>
													
												@endif
												
											</div>
											
											</td>
											
											
										</tr>
									@empty
										<td class="text-center" colspan="6">
											دیتایی جهت نمایش وجود ندارد
										</td>
									@endforelse
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							<x-admin.forms.textarea id="note" label="یادداشت" rows="5" wire:model.defer="sendNote"/>
							<x-admin.forms.dropdown id="note_type" label="نوع یادداشت" :options="['0'=>'خصوصی', '1'=>'عمومی']" wire:model.defer="noteType"/>
							<div class="form-group col-12">
								<button class="btn btn-success" wire:click="sendNote">ثبت</button>
							</div>
							<x-admin.forms.separator/>
							<x-admin.forms.header title="پیامک ها"/>

							<div class="table-responsive">
								<table class="table">
									<tbody>
									@forelse($sms ?? [] as $item)
										<tr>
											
											<td style="max-width: 150px">
											@php
												$code = stristr($item->message,'giftco');
												$code = explode("\n",$code)[0];
											@endphp
											@if($hash === true)
												{!!  (nl2br(str_replace($code,'*encoded*',$item->message))) !!}
											@else
												{!! (nl2br($item->message)) !!}
											@endif
											
											</td>
											
										</tr>
									@empty
										<td class="text-center" colspan="3">
											دیتایی جهت نمایش وجود ندارد
										</td>
									@endforelse
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							
							

							<x-admin.forms.textarea id="sms" label="ارسال پیامک جداگانه" rows="5" wire:model.defer="sendSms"/>
							<div class="form-group col-12">
								<button class="btn btn-success" wire:click="sendSms">ارسال پیامک</button>
							</div>
							

							

							<x-admin.forms.separator/>
							
							</x-admin.forms.form>
						</div>
					</div>
				</div>
				<x-admin.subheader title="سفارش" :mode="$mode" :create="false"/>

			
			</div>
@push('scripts')
    <script>
		function copy(text)
		{
			@this.call('copyLicenses',text)
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
                @this.call('deleteOrder', id)
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
					@this.call('checkCode',login)
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
				@this.call('checkPassword',login)
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
@endpush

