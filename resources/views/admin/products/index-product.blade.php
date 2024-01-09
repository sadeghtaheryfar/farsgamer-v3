<div>
    <x-admin.subheader title="محصول" :mode="$mode" :create="route('admin.products.store', ['action'=>'create'])"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
                    <div class="form-group col-12">
                        <label for="category">دسته بندی</label>
                        <select id="category" class="form-control" wire:model="category">
                            <option value="" selected>انتخاب کنید...</option>
                            @foreach($mainCategories as $category)
                                <option value="{{$category->id}}" class="h5">{{$category->title}}</option>
                                @foreach($category->subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}">{{$subCategory->title}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @isset($help)
                            <small class="text-muted">{{$help}}</small>
                        @endisset
                    </div>
					<x-admin.forms.dropdown id="status" label="وضعیت" :options="$data['status']" wire:model="status"/>

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>قیمت</th>
								<th>نمایش در ربات تلگرام</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td><a href="{{route('products.show', $item->slug)}}">{{$item->title}}</a></td>
                                    <td>{{number_format($item->price)}} تومان</td>
                                    <td>{{$item->telegram_bot ? 'بله' : 'خیر'}}</td>
									<td>{{$item->status_label}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.products.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="6">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    {{ $products->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف محصول!',
                text: 'آیا از حذف محصول اطمینان دارید؟',
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