<div>
    <x-admin.subheader title="دسته بندی مقالات" :mode="$mode" :create="route('admin.articlesCat.manage', ['action'=>'create'])"/>

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
								<th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
						
                          @forelse($articleCategories as $item)
						  <tr>
						   			<td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->title}}</td>
									<td>{{$item->slug}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.articlesCat.manage',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
                                </tr>
						  @empty
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                        
                            <tr>
                            </tr>
							 @endforelse
                            </tbody>
                        </table>
                    </div>
                      {{$articleCategories->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف دسته بندی!',
                text: 'آیا از حذف دسته بندی اطمینان دارید؟',
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