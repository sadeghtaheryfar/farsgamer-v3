<div>
    <x-admin.subheader title="ویتیرن" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">
			<x-admin.modal id="imageWithUrl" size="modal-xl" title="افزودن آیتم">
                <div>
                <x-admin.forms.validation-errors/>
            	</div>
                <x-admin.forms.input type="text" id="slider_title_new" label="عنوان" required="true" wire:model.defer="slider_title"/>
                <x-admin.forms.lfm-standalone id="slider_logo_new" label="لوگو" :image="$slider_logo" required="true" wire:model="slider_logo"/>
				<x-admin.forms.textarea id="licenses_new" label="ادرس محصولات" help="ادرس ها را با کاما از هم جدا کنید" wire:model.defer="slider_products" dir="ltr" />
				<x-admin.forms.input type="number" id="priority_new" label="ترتیب نمایش" required="true" wire:model.defer="priority"/>
                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="storeWindowSlider()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>

            <x-admin.modal id="imageWithUrlEdit" size="modal-xl" title="ویرایش آیتم">
                <div>
                <x-admin.forms.validation-errors/>
            	</div>
                <x-admin.forms.input type="text" id="slider_title" label="عنوان" required="true" wire:model.defer="slider_title"/>
                <x-admin.forms.lfm-standalone id="slider_logo" label="لوگو" :image="$slider_logo" required="true" wire:model="slider_logo"/>
				<x-admin.forms.textarea id="licenses" label="ادرس محصولات" help="ادرس ها را با کاما از هم جدا کنید" wire:model.defer="slider_products" dir="ltr"/>
				<x-admin.forms.input type="number" id="priority" label="ترتیب نمایش" required="true" wire:model.defer="priority"/>
                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="editImageWithUrl()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="ویرترین" :mode="$mode">
               	<x-admin.forms.input type="text" id="slug" label="نام " required="true" wire:model.defer="slug"/>
				<x-admin.forms.dropdown id="parent_id" label="دسته " :options="$category_id" required="true"  wire:model="parent_id"/>
				<x-admin.forms.dropdown id="product_id" label="محصول اصلی " :options="$products_id" required="false"  wire:model.defer="product_id"/>
				<x-admin.forms.lfm-standalone id="slider" label="تصویر محصول" :image="$slider" required="false" wire:model="slider"/>
				<x-admin.forms.text-editor id="description" label="توضیحات محصول" required="true" wire:model.defer="description"/>
				<x-admin.forms.header title="اسلایدر ها " class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addImageWithUrl('home_slider')">افزودن</button>
                    </div>
                </x-admin.forms.header>
				 <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>لوگو</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($window_slider as $key => $item)
                            <tr>
                                <td>{{iteration($loop, $perPage)}}</td>
								<td><img src="{{asset($item->logo)}}" alt="" width="75px" height="75px"></td>
                                <td>{{$item->title }}</td>
                                <td>
									<x-admin.edit-table wire:click="editItem({{$item->id }})"/>
                                    <x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center" colspan="4">
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