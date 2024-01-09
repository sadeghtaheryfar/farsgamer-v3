<div>
    <x-admin.subheader title="سوالات متداول" :mode="$mode" :create="route('admin.faqs.store', ['action'=>'create'])"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سوال</th>
                                <th>پاسخ</th>
                                <th>دسته</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($faqs as $id => $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{$item['question']}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{!! $item['answer'] !!}</td>
                                    <td>{{$item['category']}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.faqs.store',
                                            ['action'=>'edit', 'id' => $id])}}"/>
                                        <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                    </td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف سوال!',
                text: 'آیا از حذف سوال اطمینان دارید؟',
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