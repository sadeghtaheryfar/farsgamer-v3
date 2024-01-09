<div>
    <x-admin.subheader title="نظر" :mode="$mode" :createAble="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="نظر" :mode="$mode">
                <x-admin.forms.textarea id="comment" label="نظر" required="true" wire:model.defer="comment"/>
                <x-admin.forms.textarea id="answer" label="پاسخ" required="true" wire:model.defer="answer"/>
                @if(($this->model->commentable_type ?? '') != 'article')
                    <x-admin.forms.dropdown id="rating" label="امتیاز" :options="[1=>1,2=>2,3=>3,4=>4,5=>5]" wire:model.defer="rating"/>
                @endif
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
								<th>مقاله/محصول</th>
                                <th>نظر</th>
                                <th>پاسخ</th>
                                <th>وضعیت</th>
                                <th>نوع</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($comments as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
									<td>{{@$item->commentable->title ?? ''}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{@$item->comment}}</td>
                                    <td class="text-truncate" style="max-width: 150px">{{@$item->answer}}</td>
                                    <td>{@{$item->is_confirmed_label}}</td>
                                    <td>{{@$item->commentable_type_label}}</td>
                                    <td>
                                        <x-admin.edit-table wire:click="edit({{@$item->id}})"/>
                                        <x-admin.delete-table onclick="deleteItem({{@$item->id}})"/>
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
                    {{ $comments->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف نظر!',
                text: 'آیا از حذف نظر اطمینان دارید؟',
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