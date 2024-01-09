<div>
    <x-admin.subheader title="قانون" :mode="$mode" :create="route('admin.physical.store', ['action'=>'create'])"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>قانون</th>
                                <th>نوع</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($rules as $key => $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{!! $item->value !!}</td>
                                    <td>{{$loop->iteration == 1 ? 'توضیحات' : 'قانون'}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.rules.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف قانون!',
                text: 'آیا از حذف قانون اطمینان دارید؟',
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