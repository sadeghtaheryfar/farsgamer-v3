<div>
    <x-admin.subheader title="پرسش و پاسخ" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.dropdown id="confirmed" label="وضعیت" :options="$data['filterConfirmed']" wire:model="filterConfirmed"/>
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
								<th>محصول</th>
								<th></th>
                                <th>کاربر</th>
								 
                                <th>متن</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($questions as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
									<td>{{$item->product->title}}<td>
                                    <td>
                                        <a href="{{route('admin.users.store',['action'=>'edit', 'id' => $item->user_id])}}">
                                            {{$item->user->mobile}}
                                        </a>
                                    </td>
                                    <td class="text-truncate" style="max-width: 150px">{{$item->text}}</td>
                                    <td>{{$item->is_confirmed_label}}</td>
                                    <td>
                                        <x-admin.complete-table onclick="confirmItem({{$item->id}})"/>
                                        <x-admin.edit-table href="{{route('admin.questions.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                        <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
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
                    {{ $questions->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function confirmItem(id) {
            Swal.fire({
                title: 'تایید پرسش و پاسخ!',
                text: 'آیا از تایید پرسش و پاسخ اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('confirmQuestion', id)
                }
            })
        }

        function deleteItem(id) {
            Swal.fire({
                title: 'حذف پرسش و پاسخ!',
                text: 'آیا از حذف پرسش و پاسخ اطمینان دارید؟',
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