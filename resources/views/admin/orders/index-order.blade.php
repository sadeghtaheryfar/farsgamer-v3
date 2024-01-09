<div>
    <x-admin.subheader title="سفارش" :mode="$mode" :create="route('admin.orders.new')"/>

    <div class="content d-flex flex-column-fluid" >
        <div class="container">

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
						<x-admin.forms.dropdown id="categories" label="دسته" :options="$data" wire:model="category"/>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="tracking_code" label="کد سفارش" wire:model="filterTrackingCode"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="user_mobile" label="موبایل کاربر" wire:model="filterUserMobile"/>
                        </div>
						<div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="gate_way" label="کد درگاه" wire:model="filterGateWayCode"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
				
                    <div class="form-group col-12 ">
                        @foreach(\App\Models\Order::getOrdersStatus() as $key => $item)
							
                            @if($status == $key)
                                <button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link disabled m-2" wire:click="$set('status', '{{$key}}')">{{$item}} ({{$statusCount[$key]}})</button>
                            @else
                                <button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link m-2" wire:click="$set('status', '{{$key}}')">{{$item}} ({{$statusCount[$key]}})</button>
                            @endif
                        @endforeach
                    </div>

                    @include('admin.components.advanced-table', ['searchAble' => false])
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
                                <th>محصول</th>
                                <th>وضعیت</th>
                                
                               
                                <th>تاریخ</th>

								<th>مبدا سفارش</th>
                                <th>عملیات</th>
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
                                    <td><span style="background-color:{{$label[$item->status]}} ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);">{{$item->status_label}}</span></td>
                                   
                                   
                                    <td>{{jalaliDate($item->order->created_at)}}</td>
									<td>{!! $item->order->description == 'telegramBot' ? 'ربات تلگرام🤖' : 'سایت🌐' !!}</td>
                                    <td>
										<div style="display: inline-block;background: #f3f6f9;width: 35px;height: 33px;position: relative;top: 5px;right: -7px;border-radius: 4px;">
										<i data-container="body" data-toggle="popover" data-placement="top"
                                        data-content="{{$item->order->notes->last()->note ?? ''}}" class="flaticon-eye fa-2x" style=" top: 1px;position: relative;left: -4px;"></i>
										</div>
                                        <x-admin.complete-table onclick="completeItem({{$item->id}})"/>
                                        <x-admin.edit-table href="{{route('admin.orders.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
											
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
		setInterval(function() {
			location.reload();
		}, 1000*120);
        function completeItem(id) {
            Swal.fire({
                title: 'تکمیل سفارش!',
                text: 'آیا از تکمیل سفارش اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('completeOrder', id)
                }
            })
        }
    </script>
@endpush