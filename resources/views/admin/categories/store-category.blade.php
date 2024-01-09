<div>
    <x-admin.subheader title="دسته" :mode="$mode" :create="false"/>
	<x-admin.modal id="newGroup" size="modal-xl" title="{{$modal_title}}">
	 	<div class="col-12">
        	<x-admin.forms.validation-errors/>
			<x-admin.forms.input type="text" id="group_title" label="عنوان" required="true" wire:model.defer="group_title" />
		</div>
		<div class="col-lg-12">
			<div class="col-12">
				<button type="button" class="btn btn-primary" wire:click="addFilter()">افزودن فیلتر</button>
			</div>
			<div class="col-12 p-4">
				@foreach($filters as $key => $item)
					<div class="form-group" style="display: flex;align-items: center;border: 1px #d9d9d9 solid;">
						<div class="col-md-10" style="display: flex;align-items: center">
							<label for="">عنوان فیلتر</label>
							<input type="text" wire:model.defer="filters.{{$key}}.title" class="form-control">
							<input type="hidden" wire:model.defer="filters.{{$key}}.id" class="form-control">
						</div>
						<div  class="col-md-2">
							<button type="button" class="btn btn-danger" wire:click="deleteFilter({{$key}})">حذف این فیلتر</button>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		<x-slot name="footer">
            <button type="button" class="btn btn-primary" wire:click="storeGroup()">ثبت</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
        </x-slot>
	</x-admin.modal>
    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="دسته" :mode="$mode">
                <x-admin.forms.input id="title" type="text" label="عنوان" required="true" wire:model.defer="title"/>
                <x-admin.forms.input id="slug" type="text" label="آدرس" required="true" wire:model.defer="slug"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر پسزمینه" :image="$image" required="true" wire:model="image"/>
                <x-admin.forms.dropdown id="parent_id" label="دسته" :options="$data['parent_id']" wire:model.defer="parent_id"/>
				<x-admin.forms.checkbox id="telegram_bot" value="1" wire:model.defer="telegram_bot"> نمایش در ربات تلگرام</x-admin.forms.checkbox>
				 <x-admin.forms.input id="telegram_bot_view" type="number" help="دسته بندی ها بر اساس این عدد به صورت صعودی مرتب می شوند" label="شماره نمایش در ربات تلگرام" required="true" wire:model.defer="telegram_bot_view"/>
				<x-admin.forms.text-editor id="description" label="توضیحات " required="true" wire:model.defer="description"/>
				<x-admin.forms.lfm-standalone id="icon" label="ایکون" :image="$icon" required="true" wire:model="icon"/>
				<x-admin.forms.lfm-standalone id="picture" label="تصویر اصلی" :image="$picture" required="true" wire:model="picture"/>
				<div class="form-group col-12">
					<label for="category_atr">گروه فیلتر ها</label>
					<button wire:click.prevent="addGroup('new')" class="btn btn-light-primary font-weight-bolder btn-sm">افزودن</button>
					<table id="datatable-responsive" class="table table-striped">
						<thead>
						<tr>
							<th> عنوان</th>
							<th>عملیات</th>
						</tr>
						</thead>
						<tbody>
						@forelse($groupList as $key => $item)
							<tr>
								<td>{{ $item['title'] }}</td>
								<td>
								 	<x-admin.edit-table wire:click="addGroup('{{$key}}')" />
                                    <x-admin.delete-table onclick="deleteGroup({{$key}})"/>
								</td>
							</tr>
						@empty
							<td class="text-center" colspan="6">
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
        function deleteGroup(id) {
            Swal.fire({
                title: 'حذف گروه',
                text: 'آیا از حذف این  گروه دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deleteGroup', id)
                }
            })
        }
    </script>
@endpush
