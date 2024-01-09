<div>
    <x-admin.subheader title="ویترین ها" :mode="$mode" :create="route('admin.windows.create', ['action'=>'create'])"/>
	<div class="content d-flex flex-column-fluid">
		<div class="container">
			<div class="card mb-4 collapse show">
				<div class="card-header">
					<h6>ویترین ها</h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="form-group col-12 d-flex justify-content-between">
							
						</div>
						<div class="table-responsive">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
									
										<th>نام</th>
										<th>دسته</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									@forelse($windows as $key => $item)
										<tr>
											<td>{{iteration($loop, $perPage)}}</td>
											<td>{{$item->slug}}</td>
											<td>{{$item->category->slug}}</td>
											<td>
												<x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
												<x-admin.edit-table href="{{route('admin.windows.window',
                                            		['action'=>'edit', 'window' => $item->id])}}"/>
											</td>
										</tr>
									@empty
										<td class="text-center" colspan="7">
											دیتایی جهت نمایش وجود ندارد
										</td>
									@endforelse
									</tbody>
								</table>
							</div>
						</div>
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
                title: 'حذف تنظیمات!',
                text: 'آیا از حذف تنظیمات اطمینان دارید؟',
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