<div>
    <x-admin.subheader title="فرم های گزارش" :mode="$mode" />

    <div class="content d-flex flex-column-fluid">
        <div class="container">
			<div class="card mb-5">
                <div class="card-body">
				
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.dropdown id="role" label="نقش" :options="$data['role']" wire:model="role"/>
                        </div>
						<div class="col-md-4 col-sm-12">
							<x-admin.forms.dropdown id="status" label="وضعیت" :options="$data['status']" wire:model="status"/>
						</div>
                    </div>
				
                </div>
            </div>
            <div class="card">
                <div class="card-body">
					@include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>فرم</th>
								<th>بازه زمانی</th>
								<th>تاریخ</th>
								<th>تاریخ ویرایش</th>
								<th>تاریخ پاسخ</th>
								<th>وضعیت</th>
								<th>کاربر</th>
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
									<td>{{ $item->answerd_at ? jalaliDate($item->answerd_at) : ''}}</td>
									<td>{{ $item->status_label }}</td>
									<td>{{ $item->user->username }}</td>
									<td>{{ $item->admin->username ?? '-' }}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.admin.forms.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
										<x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="10">
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
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف فرم!',
                text: 'آیا از حذف فرم اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('delete', id)
                }
            })
        }
    </script>
@endpush