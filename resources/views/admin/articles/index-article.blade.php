<div>
    <x-admin.subheader title="مقاله" :mode="$mode" :create="route('admin.articles.store', ['action'=>'create'])"/>

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
								<th>دسته</th>
                                <th></th>
								<th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td><a href="{{route('articles.show', $item->slug)}}">{{$item->title}}</a></td>
									<td>{{ !empty($item->categories->title) ? $item->categories->title : 'بدون دسته بندی' }}<td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.articles.store',
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