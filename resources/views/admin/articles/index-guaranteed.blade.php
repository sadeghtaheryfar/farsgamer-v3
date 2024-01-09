<div>
    <x-admin.subheader title="سایت هایی تضین شدخ" :mode="$mode" :create="route('admin.guaranteed.store', ['action'=>'create'])"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
								<th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->article->title ?? '-'}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.guaranteed.store',
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
                    {{ $articles->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف مقاله!',
                text: 'آیا از حذف مقاله اطمینان دارید؟',
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