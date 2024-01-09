<div>
    <x-admin.subheader title="سوالات متداول" :mode="$mode" :createAble="true"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="سوالات متداول" :mode="$mode">
                <x-admin.forms.input type="text" id="question" label="سوال" required="true" wire:model.defer="question"/>
                <x-admin.forms.text-editor id="answer" label="پاسخ" required="true" wire:model.defer="answer"/>
                <x-admin.forms.input type="text" id="category" label="دسته" required="true" wire:model.defer="category"/>
            </x-admin.forms.form>

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سوال</th>
                                <th>پاسخ</th>
                                <th>دسته</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($faqs as $id => $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{$item['question']}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{!! $item['answer'] !!}</td>
                                    <td>{{$item['category']}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{$id}})"/>
                                        <x-admin.delete-table onclick="deleteItem({{$id}})"/>
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
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف سوال!',
                text: 'آیا از حذف سوال اطمینان دارید؟',
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