<div>
    <x-admin.subheader title="نقش" :mode="$mode" :createAble="true"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="نقش" :mode="$mode">
                <x-admin.forms.input type="text" id="name" label="عنوان" required="true" wire:model.defer="name"/>
                @foreach($permissions as $groupName => $group)
                    <div class="form-group col-12 row">
                        <div class="col-2">
                            @lang('admin.'.$groupName)
                        </div>
                        @foreach($group as $item)
                            <x-admin.forms.checkbox id="permissions-{{$item['name']}}" col="2" value="{{$item['name']}}" wire:model.defer="selectedPermissions">{{$item['name_label']}}</x-admin.forms.checkbox>
                        @endforeach
                    </div>
                @endforeach
            </x-admin.forms.form>

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
                            @forelse($roles as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{$item->id}})"/>
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
                    {{ $roles->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف نقش!',
                text: 'آیا از حذف نقش اطمینان دارید؟',
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