<div>
    <x-admin.subheader title="سفارش" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
					
                    <div class="form-group col-12">
					<button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link  m-2" wire:click="$set('status', '')">{{ auth()->user()->translate('همه') }}    </button>
                        @foreach(\App\Models\Order::getOrdersStatus() as $key => $item)
							@if($key == \App\Models\Order::STATUS_CANCELLED)
								@continue
							@endif
                            @if($status == $key)
                                <button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-outline-success disabled  m-2" wire:click="$set('status', '{{$key}}')">{{ auth()->user()->translate($item) }}  ({{$statusCount[$key] }})  </button>
                            @else
                                <button type="button" style="border: 1px solid #E4E6EF;" class="btn btn-link  m-2" wire:click="$set('status', '{{$key}}')">{{ auth()->user()->translate($item) }} ({{$statusCount[$key]}})</button>
                            @endif
                        @endforeach
                    </div>

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ auth()->user()->translate('سفارش') }}</th>
                                <th>{{ auth()->user()->translate('محصول') }}</th>
                                <th>{{ auth()->user()->translate('وضعیت') }}</th>
                              
                                <th>{{ auth()->user()->translate('تاریخ') }}</th>
                                <th>{{ auth()->user()->translate('عملیات') }}</th>
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
                            @forelse($orderDetails as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->order_id + \App\Models\Order::CHANGE_ID}}</td>
                                    <td>{{ auth()->user()->translate($item->product->title) }}</td>
                                    <td><span style="background-color:{{$label[$item->status]}} ;color: #000;padding: 5px;border-radius: 6px;box-shadow: 0 3px 4px rgba(134, 134, 145, 0.25);"> {{ auth()->user()->translate($item->status_label) }}</span></td>
                                    <td>{{ auth()->user()->language == 'basic' ? jalaliDate($item->order->created_at) : $item->order->created_at }}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.products.order.store',
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
                    {{ $orderDetails->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>