<div>
    <x-admin.subheader title="پرسش و پاسخ" :mode="$mode" :createAble="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="پرسش و پاسخ" :mode="$mode">
                <x-admin.forms.textarea id="parent_text" label="متن" required="true" wire:model.defer="parent_text"/>
                <x-admin.forms.textarea id="text" label="پاسخ" required="true" wire:model.defer="text"/>
                <x-admin.forms.checkbox id="is_confirmed" value="1" wire:model.defer="is_confirmed">تایید شده</x-admin.forms.checkbox>
            </x-admin.forms.form>

            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table')
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>متن</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($questions as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{$item->text}}</td>
                                    <td>{{$item->is_confirmed_label}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{$item->id}})"/>
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
                    {{ $questions->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
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