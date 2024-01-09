<div  class="overflow-hidden">
<x-admin.subheader title="سفارش" :mode="$mode" :create="false"/>
	<div class="row">
    	<div class="col-12 col-xl-8">
			<div class="content d-flex flex-column-fluid">
					<div class="">

						<div>
							<x-admin.forms.validation-errors/>
						</div>
						<x-admin.forms.form title="سفارش (<span class='copy_text'>{{$model->order->tracking_code}}</span>)" :mode="$mode" >
						
							<div class="form-group col-12">
								<div class="row">
									<x-admin.forms.header title="اطلاعات کاربر"/>
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
												
												<td>{{ number_format($model->order->discount ?? 0) }} تومان </td>
												<td>{{ number_format( ($model->order->discount ?? 0) + ($model->order->voucher_amount ?? 0) ) }} تومان </td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								
								
							</div>
							
							<x-admin.forms.separator/>
							<x-admin.forms.header title="محصولات"/>

							<div class="form-group col-4 p-3 bg-info">
								نام : {{$model->product->title}}
							</div>
							<div class="form-group col-5 p-3 bg-info">
								وضعیت : {{$model->status_label}}
							</div>
							<div class="form-group col-1 p-3 bg-info">
								تعداد : {{$model->quantity}}
							</div>
							<div class="form-group col-2 p-3 bg-info">
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
												
													{{ ($license) }}
											
											</div>
											

										@endforeach
									@endif
								</div>
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
										@if(!$item->is_user_note)
											@continue
										@endif	
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
							
							

						
							

							

							<x-admin.forms.separator/>
							
							</x-admin.forms.form>
						</div>
					</div>
					@endif
				</div>
				

			
			</div>


