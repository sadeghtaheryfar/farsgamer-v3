<div>
    <x-admin.subheader title="درخواست های همکاری" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
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
                                <th>نام</th>
                                <th>نام خانوادگی</th>
                                <th>شماره همراه</th>
                                <th>ادرس ایمیل</th>
								<th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($partners as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
									<td>{{ $item->name }}</td>
									<td>{{ $item->family }}</td>
									<td>{{ $item->mobile }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->status_label }}</td>
                                    <td>
                                        <x-admin.complete-table onclick="confirmItem({{$item->id}})"/>
                                       
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $partners->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function confirmItem(id) {
            Swal.fire({
                title: 'تایید درخواست!',
                text: 'آیا از تایید درخواست اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('confirmItem', id)
                }
            })
        }

        function deleteItem(id) {
            Swal.fire({
                title: 'حذف درخواست!',
                text: 'آیا از حذف درخواست اطمینان دارید؟',
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