<div>
    <x-admin.subheader title="مقاله" :mode="$mode" :createAble="true"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="مقاله" :mode="$mode">
                <x-admin.forms.input type="text" id="title" label="عنوان" required="true" wire:model.defer="title"/>
                <x-admin.forms.input type="text" id="slug" label="آدرس" required="true" wire:model.defer="slug"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>
                <x-admin.forms.text-editor id="description" label="توضیحات" required="true" wire:model.defer="description"/>
                <x-admin.forms.input type="text" id="seo_keywords" label="کلمات کلیدی سئو" required="true" help="کلمات کلیدی را با کاما از هم جدا کنید" wire:model.defer="seo_keywords"/>
                <x-admin.forms.input type="text" id="seo_description" label="توضیحات سئو" required="true" wire:model.defer="seo_description"/>
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
                            @forelse($articles as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td><a href="{{route('articles.show', $item->slug)}}">{{$item->title}}</a></td>
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
                    {{ $articles->links('admin.components.pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف مقاله!',
                text: 'آیا از حذف مقاله اطمینان دارید؟',
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