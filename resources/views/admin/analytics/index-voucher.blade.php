<div>
    <x-admin.subheader title="آمار کدهای تخفیف" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table', ['searchAble' => false])
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>کد</th>
                                <th>تعداد استفاده</th>
                                <th>مبلغ استفاده</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($vouchers as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->total_order}}</td>
                                    <td>{{number_format($item->total_price)}} تومان</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="5">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $vouchers->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>