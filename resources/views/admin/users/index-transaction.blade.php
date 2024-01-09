<div>
    <x-admin.subheader title="تراکنش ها" :mode="$mode" :create="route('admin.roles.store', ['action'=>'create'])"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>کاربر</th>
                                <th>مقدار</th>
                                <th>وضعیت</th>
                                <th>توضیحات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transaction as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <a href="{{route('admin.users.store',['action'=>'edit', 'id' => $item->payable_id])}}"/>
                                        {{$item->payable_id}}
                                        </a>
                                    </td>
                                    <td>{{number_format($item->amount)}}</td>
                                    <td>{{$item->confirmed ? '1' : '0'}}</td>
                                    <td>{{$item->meta['description']}}</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $transaction->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>