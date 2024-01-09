<div>
    <x-admin.subheader title="فرم های گزارش" :mode="$mode" />

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>فرم</th>
								<th>بازه زمانی</th>
								<th>تاریخ ارسال</th>
								<th>تاریخ ویرایش</th>
								<th>وضعیت</th>
								<th>مدیر</th>
								<th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($forms as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->form_title }}</td>
									<td>{{ $item->form_cron }}</td>
									<td>{{jalaliDate($item->created_at)}}</td>
									<td>{{jalaliDate($item->updated_at)}}</td>
									<td>{{ $item->status_label }}</td>
									<td>{{ $item->admin->username ?? '-' }}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.my.forms.store',
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
                </div>
            </div>
        </div>
    </div>
</div>
