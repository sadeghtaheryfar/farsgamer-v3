<div>
    @include('admin.products.modals')

    <x-admin.subheader title="فرم" :mode="$mode" :create="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="فرم" :mode="$mode">
				
                <x-admin.forms.input type="text" id="title" label="عنوان" required="true" wire:model.defer="title"/>
				<x-admin.forms.input type="text" id="form_messages" label="پیام" wire:model.defer="form_messages"/>
                <x-admin.forms.dropdown id="cron" label="باز زمانی" :options="$data['crons']" required="true" wire:model.defer="cron"/>
				<x-admin.forms.textarea id="managers" label="مدیر های فرم" help="شماره ها را با کاما از هم جدا کنید"  wire:model.defer="managers"/>
				<x-admin.forms.textarea id="users" label="کاربران " help="شماره ها را با کاما از هم جدا کنید"  wire:model.defer="users"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="سوالات" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addForm('textArea')">textArea</button>
                    </div>
                </x-admin.forms.header>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody wire:sortable="updateFormPosition()">
                        @forelse($form as $key => $item)
                            <tr wire:sortable.item="{{ $item['name'] }}" wire:key="{{ $item['name'] }}">
                                <td wire:sortable.handle>{{ $item['position'] }}</td>
                                <td>{!! $item['label'] ?? ''!!}</td>
                                <td>
                                    <x-admin.edit-table wire:click="editForm({{$key}})"/>
                                    <x-admin.delete-table onclick="deleteFormItem({{$key}})"/>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>


            </x-admin.forms.form>

        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteFormItem(id) {
            Swal.fire({
                title: 'حذف فرم!',
                text: 'آیا از حذف فرم اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deleteForm', id)
                }
            })
        }

    </script>
@endpush