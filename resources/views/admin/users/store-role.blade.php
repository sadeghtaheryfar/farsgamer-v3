<div>
    <x-admin.subheader title="نقش" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="نقش" :mode="$mode">
                <x-admin.forms.input type="text" id="name" label="عنوان" required="true" wire:model.defer="name"/>
                @foreach($permissions as $item)
                            <x-admin.forms.checkbox id="permissions-{{$item['name']}}" col="3" value="{{$item['name']}}"
                                                    wire:model.defer="selectedPermissions">@lang('admin.permission_'.$item['name'])
                            </x-admin.forms.checkbox>
                @endforeach
            </x-admin.forms.form>
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