<div>
    <x-admin.subheader title="سفارش" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid" >
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
                                <th>محصول</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
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
                                    <td>
										<div style="display: inline-block;background: #f3f6f9;width: 35px;height: 33px;position: relative;top: 5px;right: -7px;border-radius: 4px;">
										<i data-container="body" data-toggle="popover" data-placement="top"
                                        data-content="{{$item->order->notes->last()->note ?? ''}}" class="flaticon-eye fa-2x" style=" top: 1px;position: relative;left: -4px;"></i>
										</div>
                                        <x-admin.edit-table href="{{route('partner.order',
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