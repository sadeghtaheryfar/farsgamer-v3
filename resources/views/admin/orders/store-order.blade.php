<div wire:poll.40s = "updateTime()"  class="overflow-hidden">
<x-admin.subheader title="سفارش" :mode="$mode" :factor="true" :create="false"/>
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
						<x-admin.forms.form title="سفارش (<span class='copy_text'>{{$model->order->tracking_code}}</span>)" :mode="$mode" >
						@if(auth()->user()->hasPermissionTo('show_order_details'))
							<div class="form-group col-12">
								<div class="row">
									<x-admin.forms.header title="اطلاعات کاربر"/>
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
											<td><a href="{{route('admin.users.store', ['action'=>'edit', 'id' => $model->order->user_id])}}">مشاهده</a></td>
											<td><a href="{{route('admin.orders', ['filterUserMobile'=>$model->order->mobile])}}">مشاهده</a></td>
											<td>{{ $model->order->name ?? '' }}</td>
											<td>{{ $model->order->family ?? '' }}</td>
											<td>{{ $model->order->mobile ?? '' }}</td>
											<td>{{ $model->order->email ?? '' }}</td>
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
											<td>{{ $model->order->province ?? '' }}</td>
											<td>{{ $model->order->city ?? '' }}</td>
											<td>{{ $model->order->postalCode ?? '' }}</td>
											<td>{{ $model->order->user_ip ?? '' }}</td>
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
											<td>{{ $model->order->address ?? '' }}</td>
											<td>{{ $model->order->description ?? '' }}</td>
											<td>{{ jalaliDate($model->order->created_at) }}</td>
										</tr>
										
										</tbody>
									</table>
									@if($model->file)
									<div class="col-12">
										<img src="{{asset('media/'.$model->file)}}" style="width:200px;height:200px">
									</div>
									@endif
								
									<x-admin.forms.header title="اطلاعات پرداخت"/>
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
												<td>{{number_format($model->order->price)}}تومان </td>
												<td>{{number_format($model->order->wallet_pay)}}تومان </td>
												<td>{{number_format($model->order->total_price)}} تومان </td>
												<td>{{number_format($model->order->details()->count()) }} عدد </td>
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
												<td>{{$model->order->tracking_code}}</td>
												<td>{{ $payment ? ( $payment->payment_gateway.' ('.jalaliDate($payment->updated_at).')' ) : ''}}</td>
												<td>{{ $payment ? $payment->payment_ref : ''}}</td>
											</tr>
											</tbody>
										</table>
									</div>
									@if($model->cart_data)
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
													<td>{{ $model->cart_data['cart']['cart_number'] }}</td>
													<td>{{ $model->cart_data['form_selected']['value'] }}</td>
												</tr>
												</tbody>
											</table>
										</div>
									@endif
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
												<td>{{ $model->order->voucher->code ?? '' }}</td>
												<td>{{ number_format($model->order->voucher_amount) }} تومان </td>
												<td>{{ number_format($model->order->discount ?? 0) }} تومان </td>
												<td>{{ number_format( ($model->order->discount ?? 0) + ($model->order->voucher_amount ?? 0) ) }} تومان </td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								
								<button class="btn btn-danger" type="button" onclick="deleteItem({{$model->id}})"><i class="fa fa-trash"></i> حدف سفارش</button>
							</div>
							@endif
							<x-admin.forms.separator/>
							<x-admin.forms.header title="محصولات"/>

							<div class="form-group col-4 p-3 bg-light">
								نام : {{$model->product->title}}
							</div>
							<div class="form-group col-5 p-3 bg-light">
								وضعیت : {{$model->status_label}}
							</div>
							<div class="form-group col-1 p-3 bg-light">
								تعداد : {{$model->quantity}}
							</div>
							<div class="form-group col-2 p-3 bg-light">
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
														@if (isset($form['inserted_value']))
													 		{{ $form['inserted_value'] ?? ''}}
														@elseif(isset($form['value'])) 
															{{ $form['value'] ?? ''}}
														@endif
													</span>
												</div>
												<div class="form-group col-2">
														@if (isset($form['inserted_price']))
															 <td>{{number_format(($form['inserted_price'] ?? 0) * $model->quantity)}} تومان</td>
														@else
															<td>{{number_format(($form['price'] ?? 0) * $model->quantity)}} تومان</td>
														@endif
													
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
										<div class="form-group col-12"  wire:ignore.self>
											<button class="btn btn-primary" wire:loading.attr="disabled" onclick="getNumber()">ارسال مجدد لایسنس</button>
										</div>
									@endif
								</div>
							</div>
						@if(auth()->user()->hasPermissionTo('edit_orders'))	
						
						<div class="form-group col-12"  wire:ignore.self>
							<button class="btn btn-primary" onclick="crackHash()">باز کردن قفل لایسنس ها</button>
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
					 	@endif
							
							<x-admin.forms.separator/>
					<x-admin.forms.header title="سایر محصولات"/>



						<div class="row">
							@foreach($model->order->details as $key => $detail)
								@if($detail->id == $model->id)
									@continue
								@endif
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
											<td>{{ $detail->product->title }}</td>
											<td>{{ $detail->quantity }}</td>
											<td>{{ number_format($detail->price) }}تومان  </td>
											<td>
												{{ $detail->status_label }}
											</td>
											<td>
												<x-admin.edit-table href="{{route('admin.orders.store',
                                            ['action'=>'edit', 'id' => $detail->id])}}"/>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							@endforeach
							
						</div>

						</x-admin.forms.form>
						
					</div>
				</div>
					</div>
					
					@if(auth()->user()->hasPermissionTo('edit_orders'))	
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
					@endif
					
				</div>
				

			
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
					@this.call('verifyRequest',login)
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
				@this.call('checkPassword',login)
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
				@this.call('getNumber',login)
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

