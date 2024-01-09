<div>
    <x-admin.subheader title="کاربران" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">
		@if (!auth()->user()->hasRole('مدیر محصول')  || auth()->user()->hasRole('super_admin'))
            <div class="card mb-5">
                <div class="card-body">
				
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.dropdown id="role" label="نقش" :options="$data['role']" wire:model="role"/>
                        </div>

						<div class="col-md-4 col-sm-12">
                            <x-admin.forms.dropdown id="status" label="وضعیت احراز هویت" :options="$data['auth_status']" wire:model="status"/>
                        </div>

						<div class="col-md-4 col-sm-12">
                            <x-admin.forms.dropdown id="status" label="وضعیت سفارش" :options="$data['orderStataus']" wire:model="orderStataus"/>
                        </div>
                    </div>
				
                </div>
            </div>
		@endif	
            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>موبایل</th>
								@if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))
                                <th>موجودی کیف پول</th>
                                <th>تعداد سفارشات</th>
								<th>مبلغ پرداخت شده</th>
								<th>وضعیت احراز هویت </th>
								<th>بررسی شده توسط </th>
								@endif	
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->family}}</td>
                                    <td>{{$item->mobile}}</td>
									@if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))
                                    <td>{{number_format($item->balance)}} تومان</td>
                                    <td>{{$item->orders_count}}</td>
									<td>{{ number_format($item->orders_sum_total_price) }} تومان</td>
									<td>{{$item->auth_label}}</td>
									<td>{{$item->checkedBy->username ?? ''}}</td>
									@endif	
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.users.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="9">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $users->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
