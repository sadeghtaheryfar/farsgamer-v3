<div>
    <div class="d-flex flex-column-fluid">
        <div class="container">

            <x-admin.subheader title="اعلانات" :mode="$mode" :createAble="true"/>

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="اعلانات" :mode="$mode">
                <x-admin.forms.textarea id="message" label="اعلان" required="true" wire:model="message"/>
            </x-admin.forms.form>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اعلان</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($notifications as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->message}}</td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف اعلان!',
                text: 'آیا از حذف اعلان اطمینان دارید؟',
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