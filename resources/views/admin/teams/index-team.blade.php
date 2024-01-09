<div>
    <x-admin.subheader title="تیم فارس گیمر" :mode="$mode" :create="route('admin.teams.store', ['action'=>'create'])"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">

                  
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
								<th>تصویر</th>
                                <th>نام</th>
								<th>سمت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teams as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
									<td><img src="{{asset($item->image)}}" alt="" width="75px" height="75px"></td>
                                    <td>{{$item->name}}</td>
									<td>{{$item->task}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.teams.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="3">
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
                title: 'حذف کد تخفیف!',
                text: 'آیا از حذف  اطمینان دارید؟',
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