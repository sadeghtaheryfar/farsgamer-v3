<div>
    <x-admin.subheader title="استریمرها" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <x-admin.modal id="streams" size="modal-xl" title="افزودن آیتم">
                <div>
                    <x-admin.forms.validation-errors/>
                </div>
                <x-admin.forms.input type="text" id="name" label="نام" required="true" wire:model.defer="name"/>
                <x-admin.forms.input type="text" id="description" label="توضیح" required="true" wire:model.defer="description"/>
                <x-admin.forms.dropdown  id="media" label="شبکه" :options="$allMedia" required="true" wire:model="media"/>
				<x-admin.forms.input type="text" id="url" label="آدرس" required="true" wire:model.defer="url"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>

                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="update()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="استریمر" :mode="$mode">
                <x-admin.forms.header title="استریمرها" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addStreams()">افزودن</button>
                    </div>
                </x-admin.forms.header>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>توضیح</th>
                            <th>شناسه</th>
                            <th>تصویر</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($streams as $id => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['description']}}</td>
                                <td>
                                    <span>آدرس استریمر : </span>
                                    <span>{{$item['url']}}</span>
                                    <br>
									<span> شبکه : </span>
                                    <span>{{$item['media'] ?? ''}}</span>
									<br>
                                    <span>انلاین : </span>
                                    <span>https://farsgamer.com/streams/{{$item['id']}}?status=online</span>
                                    <br>
                                    <span>افلاین : </span>
                                    <span>https://farsgamer.com/streams/{{$item['id']}}?status=offline</span>
                                </td>
                                <td><img src="{{asset($item['image'])}}" alt="" width="75px" height="75px"></td>
                                <td>
                                    <x-admin.delete-table onclick="deleteItem({{$id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="7">
                                دیتایی جهت نمایش وجود ندارد
                            </td>
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
        function deleteItem(id) {
            Swal.fire({
                title: 'حذف تنظیمات!',
                text: 'آیا از حذف تنظیمات اطمینان دارید؟',
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