<div>
    <x-admin.subheader title="قرعه کشی" :mode="$mode" :create="false"/>
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
                            <x-admin.forms.input type="text" id="tracking_code" label="کد سفارش" wire:model="filterTrackingCode"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="user_mobile" label="موبایل کاربر" wire:model="filterUserMobile"/>
                        </div>
						 <div class="col-md-4 col-sm-12">
                          	<x-admin.forms.date-picker id="start_at" label="از تاریخ"   wire:model="start_at"/>
							<x-admin.forms.date-picker id="end_at" label="تا تاریخ"   wire:model="end_at"/>
                        </div>
						
                    </div>
                </div>
            </div>
			@if($tab == 'users')
			<div class="row">
				<div class="col-xl-4">
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

									<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><p> {{$lottey_users}}</p></span>
									<span class="font-weight-bold text-dark font-size-sm">تعداد شرکت کنندگان</span>
								</div>
						</div>
				</div>	
				<div class="col-xl-4">
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

									<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><p> {{($users[0]->username ?? $users[0]->mobile ) .' : '.$users[0]->details_count }}</p></span>
									<span class="font-weight-bold text-dark font-size-sm">بیشترین سفارش</span>
								</div>
						</div>
				</div>	
				<div class="col-xl-4">
						<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
								<!--begin::Body-->
								<div class="card-body">
									<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

									<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"><p> {{$chance }}</p></span>
									<span class="font-weight-bold text-dark font-size-sm">بیشترین شانس</span>
								</div>
						</div>
				</div>	
			</div>
			@endif
            <div class="card">
                <div class="card-body">
                    @include('admin.components.advanced-table', ['searchAble' => false])
					@if($tab == 'orders')
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
                            @forelse($orders as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->order_id + \App\Models\Order::CHANGE_ID}}</td>
                                    <td>{{($item->product_data['title'] ?? '')}}</td>
									 <td>{{$item->product->lottery*$item->quantity}}</td>
                                    <td><span style="background-color:{{$label[$item->status]}} ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);">{{$item->status_label}}</span></td>
                                   
									<td>{{$item->quantity}}</td>
                                    <td>{{number_format($item->price)}} تومان</td>
									<td>{{$item->order->user->mobile}}</td>
                                    <td>{{jalaliDate($item->order->created_at)}}</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="8">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $orders->links('admin.components.pagination') }}
					@elseif($tab == 'users')

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
                            @forelse($users as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->name.' '.$item->family}}</td>
									<td>{{$item->mobile}}</td>
									<td>{{$item->details_count}}</td>
									<td>{{ $item->lotteries($start_at, $end_at) }}</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="8">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					 {{ $users->links('admin.components.pagination') }}
					@endif
                </div>
            </div>
        </div>
    </div>
</div>
