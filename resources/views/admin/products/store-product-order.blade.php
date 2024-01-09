
<div class="overflow-hidden" wire:poll.40s = "updateTime()">
<x-admin.subheader title="سفارش" :mode="$mode" :create="false"/>
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
								title: '{{auth()->user()->translate('اخطار')}}',
								text: 'هم اکنون {{$user_in_order ?? 'شخص دیگری'}} در حال ویرایش این سفارش می باشد(This order is currently being edited by {{$user_in_order ?? 'شخص دیگری'}})',
								icon: 'warning',
								showCancelButton: false,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								cancelButtonText: 'خیر',
								confirmButtonText: 'ok'
							}).then((result) => {
								if (result.value) {
								// @this.call('', '')
								}
							})
						</script>
						@endpush
						@endif 
						<x-admin.forms.form title="{{ auth()->user()->translate('سفارش') }}(<span class='copy_text'>{{$model->order->tracking_code}}</span>)" :mode="$mode" >
							
							@if(!auth()->user()->hasRole('پشتیبان محصول'))
							<div class="form-group col-4">
								<div class="row">
									<x-admin.forms.header title="{{ auth()->user()->translate('اطلاعات کاربر') }}"/>
									<div class="form-group col-12">
										<p><a href="{{route('admin.users.store', ['action'=>'edit', 'id' => $model->order->user_id])}}">{{ auth()->user()->translate('پروفایل کاربر') }}</a></p>
										<p><a href="{{route('admin.orders', ['filterUserMobile'=>$model->order->mobile])}}">{{ auth()->user()->translate('سفارشات کاربر') }}</a></p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('نام') }} : {{ auth()->user()->fingilish($model->order->name ?? '') }}</p>
									</div>
									
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('نام خانوادگی') }} : {{ auth()->user()->fingilish($model->order->family ?? '') }}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('موبایل') }} : {{ $model->order->mobile ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('ایمیل') }} : {{$model->order->email ?? ''}}</p>
									</div>
									
								</div>
								
							</div>
							
							
							<div class="form-group col-4">
								<div class="row">
									<x-admin.forms.header title="{{ auth()->user()->translate('اطلاعات کاربر') }}"/>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('استان') }} : {{ auth()->user()->fingilish($model->order->province ?? '') }}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('شهر') }} : {{ auth()->user()->fingilish($model->order->city ?? '') }}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('کد پستی') }} : {{ $model->order->postalCode ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('آدرس') }} : {{ $model->order->address ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('توضیحات') }}  : {{$model->order->description ?? ''}}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('آی پی') }} : {{$model->order->user_ip ?? ''}}</p>
									</div>
								</div>
							</div>
							<div class="form-group col-4">
								<div class="row">
									<x-admin.forms.header title="{{ auth()->user()->translate('اطلاعات پرداخت') }}"/>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('مجموع') }} : {{number_format($model->order->price ?? 0)}} {{ auth()->user()->translate('تومان') }} </p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('تخفیف') }} : {{number_format($model->order->discount ?? 0)}} {{ auth()->user()->translate('تومان') }}</p>
										<p>{{ auth()->user()->translate('کد تخفیف') }} : {{$model->order->voucher->code ?? ''}} ({{number_format($model->order->voucher_amount)}} {{ auth()->user()->translate('تومان') }})</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>{{ auth()->user()->translate('کیف پول') }} : {{number_format($model->order->wallet_pay ?? 0)}} {{ auth()->user()->translate('تومان') }}</p>
									</div>
									<div class="form-group col-12 m-0">
										<p>
											<span>{{ auth()->user()->translate('جمع کل فاکتور') }} : {{number_format($model->order->total_price ?? 0)}} {{ auth()->user()->translate('تومان') }}</span>
											<span>{{ auth()->user()->translate('برای') }} : 
											<span> {{$model->order->details()->count()}} {{ auth()->user()->translate('محصول') }}</span>
										</p>
									</div>
									<div class="form-group col-12 m-0">
									
									
									</div>
								</div>
							</div>
							@endif
							
							<x-admin.forms.separator/>
							<x-admin.forms.header title="{{ auth()->user()->translate('محصولات') }}"/>
							@php
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
							@endphp
							<div class="form-group col-6 p-3 bg-light">
								{{ auth()->user()->translate('نام') }} : {{ auth()->user()->translate($model->product->title) }}
							</div>
							<div class="form-group col-6 p-3 bg-light">
								 
								<span style="background-color:{{$label[$model->status]}} ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);">{{ auth()->user()->translate('وضعیت') }} : {{ auth()->user()->translate($model->status_label) }} </span>
							</div>
							<div class="form-group col-6 p-3 bg-light">
								{{ auth()->user()->translate('تعداد') }} : {{$model->quantity}}
							</div>
							<div class="form-group col-6 p-3 bg-light">
								{{ auth()->user()->translate('مبلغ') }} :{{number_format($model->price)}} {{ auth()->user()->translate('تومان') }}
							</div>
								@if($payment)
									<p>درگاه : {{$payment->payment_gateway}} ({{jalaliDate($payment->updated_at)}})</p>
									<p>کد پیگیری درگاه : {{$payment->payment_ref}}</p>
								@endif
							<div class="form-group col-12">
								@if(sizeof($model->form) > 0)
									<div class="row">
										<div class="form-group col-12 d-flex justify-content-between">
											<div>{{ auth()->user()->translate('فرم') }}</div>
										</div>
										@foreach($model->form as $form)
											@if(($form['type'] ?? '') != 'paragraph')
												<div class="form-group col-4">
													<td > {{ auth()->user()->translate(trim(strip_tags($form['label']))) }} </td>
												</div>
												<div class="form-group col-6  p-0 m-0 ">
													<span class="copy_text p-0 m-0">
														{{ auth()->user()->translate($form['value'] ?? '') }}
													</span>
												</div>
												<div class="form-group col-2">
													<td>{{number_format(($form['price'] ?? 0) * $model->quantity)}} {{ auth()->user()->translate('تومان') }}</td>
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
											<div>{{ auth()->user()->translate('لایسنسیس') }}</div>
											{{--                                @if($model->quantity != sizeof($model->licenses) &&--}}
											{{--                                    $model->status != \App\Models\Order::STATUS_NOT_PAID)--}}
											{{--                                    <button class="btn btn-success" wire:click="completeLicenses()">کامل کردن لاینسیس ها</button>--}}
											{{--                                @endif--}}
										</div>
										@foreach($model->licenses as $license)
											
											<div oncopy="copy('{{$license}}')"  class="form-group col-12"  wire:ignore.self>
												
													{{ ($license) }}
												
											</div>
											

										@endforeach
									@endif
								</div>
							</div>
						<div class="form-group col-12">
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '{{\App\Models\Order::STATUS_HOLD}}')">{{auth()->user()->translate('در انتظار بررسی توسط پشتیبانی')}} </button>
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '{{\App\Models\Order::STATUS_PROCESSING}}')">{{auth()->user()->translate('در حال انجام توسط تیم ثبت سفارشات')}} </button>
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '{{\App\Models\Order::STATUS_STORE}}')">{{auth()->user()->translate('درحال آماده سازی در انبار')}} </button>
							<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('orderStatus', '{{\App\Models\Order::STATUS_COMPLETED}}')">{{auth()->user()->translate('تکمیل شده')}} </button>
						</div>
						
							
							
					 		
							
							

						</x-admin.forms.form>
					</div>
				</div>
					</div>
					
					<div class="col-12 col-xl-4">
						<div class="content d-flex flex-column-fluid">
							<x-admin.forms.form title="" >
							<x-admin.forms.header title="{{ auth()->user()->translate('یادداشت ها')}}"/>
							<div class="table-responsive">
								<table class="table">
									<tbody>
									@forelse($notes ?? [] as $key => $item)
										@if(auth()->user()->hasRole('پشتیبان محصول') && $item->is_user_note)
											@continue
										@endif
										<tr >
											
											<td class="py-2">
											{{ $item->user->full_name ?? auth()->user()->translate('سیستم') }} : 
											
												{!! (nl2br($item->note)) !!}
											
											
											<p class="mt-2">
												{{ auth()->user()->translate('در تاریخ')}} {{ auth()->user()->language == 'basic' ? jalaliDate($item->created_at) : $item->created_at }}
											</p>
											<div class="d-flex justify-content-between my-2">
												@if(@!$item->trashed())
													<button wire:click="deleteNote({{$key}})" class="btn btn-light-danger font-weight-bolder btn-sm">{{ auth()->user()->translate('حذف یادداشت') }}</button>
													
												@endif
												@if($item->trashed())
													
													<span class="label label-lg label-light-danger label-inline">{{ auth()->user()->translate('حذف شده') }}</span>
											
												@else
													<P>
													{!! $item->is_user_note ?
													'<span class="label label-lg label-light-primary label-inline">'.auth()->user()->translate('عمومی').'</span>' :
													'<span class="label label-lg label-light-warning label-inline">'.auth()->user()->translate('خصوصی').'</span>' !!}
													</p>
													
												@endif
												
											</div>
											
											</td>
											
											
										</tr>
									@empty
										<td class="text-center" colspan="6">
										{{ auth()->user()->translate('دیتایی جهت نمایش وجود ندارد') }}
											
										</td>
									@endforelse
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							<x-admin.forms.textarea id="note" label="{{ auth()->user()->translate('یادداشت') }}" rows="5" wire:model.defer="sendNote"/>
							
							<div class="form-group col-12">
								<button class="btn btn-success" wire:click="sendNote">{{ auth()->user()->translate('ثبت') }}</button>
							</div>
							<x-admin.forms.separator/>
							
							
							

							
							

							

							<x-admin.forms.separator/>
							
							</x-admin.forms.form>
						</div>
					</div>
				
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

