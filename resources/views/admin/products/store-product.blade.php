<div>
    @include('admin.products.modals')

    <x-admin.subheader title="محصول" :mode="$mode" :create="false"/>

    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="محصول" :mode="$mode">
				
                <x-admin.forms.input type="text" id="title" label="عنوان" required="true" wire:model.defer="title"/>
				<div class="col-12">
					<button class="btn btn-primary" wire:click="copyProduct">دوبل کردن محصول</button>
				</div>
                <x-admin.forms.input type="text" id="slug" label="آدرس" required="true" wire:model.defer="slug"/>
                <x-admin.forms.text-editor id="short_description" label="توضیحات کوتاه" wire:model.defer="short_description"/>
                <x-admin.forms.text-editor id="description" label="توضیحات" wire:model.defer="description"/>
                <x-admin.forms.dropdown id="currency_id" label="واحد پول" :options="$data['currency_id']" help="درصورت خالی بودن بر حسب تومان محاسبه میشود" wire:model.defer="currency_id"/>
                <x-admin.forms.input type="number" id="amount" label=" قیمت فروش" required="true" help="بر اساس واحد پول محاسبه میشود" wire:model.defer="amount"/>
				<x-admin.forms.input type="number" id="buy_amount" label="قیمت خرید" required="true" help="بر اساس واحد پول محاسبه میشود" wire:model.defer="buy_amount"/>
				<x-admin.forms.checkbox id="telegram_bot" value="1" wire:model.defer="telegram_bot"> نمایش در ربات تلگرام</x-admin.forms.checkbox>
				<x-admin.forms.checkbox id="fgtal" value="1" wire:model.defer="fgtal">  fgtal</x-admin.forms.checkbox>
				<x-admin.forms.checkbox id="const_price" value="1" wire:model.defer="const_price">قیمت ثابت</x-admin.forms.checkbox>
                <x-admin.forms.input type="number" id="partner_amount" label="قیمت همکاری" required="true" help="بر اساس واحد پول محاسبه میشود" wire:model.defer="partner_amount"/>
                <x-admin.forms.input type="number" id="quantity" label="تعداد" help="درصورت خالی بودن محدودیتی اعمال نمیشود" wire:model.defer="quantity"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model.defer="image"/>
                <x-admin.forms.lfm-standalone id="media" label="تصاویر" :image="$media" wire:model.defer="media"/>
                <x-admin.forms.dropdown id="type" label="نوع" :options="$data['type']" required="true" wire:model.defer="type"/>
                <x-admin.forms.input type="number" id="score" label="امتیاز" required="true" wire:model.defer="score"/>
				 <x-admin.forms.input type="number" id="lottery" label="شانس قرعه کشی" required="true" wire:model.defer="lottery"/>
                <x-admin.forms.dropdown id="status" label="وضعیت" :options="$data['status']" required="true" wire:model.defer="status"/>
                <x-admin.forms.input type="text" id="delivery_time" label="زمان تحویل" required="true" help="بر حسب ساعت" wire:model.defer="delivery_time"/>
                <x-admin.forms.dropdown id="category_id" label="دسته" :options="$data['category_id']" required="true" wire:model="category_id"/>
				 <x-admin.forms.input id="telegram_bot_view" type="number" help="دسته بندی ها بر اساس این عدد به صورت صعودی مرتب می شوند" label="شماره نمایش در ربات تلگرام" required="true" wire:model.defer="telegram_bot_view"/>


				<div class="form-group col-12">
					<label>فیلتر ها</label>
					@foreach($filter_groups as $group)
						<x-admin.forms.dropdown id="group{{$group->id}}" label="{{$group->title}}" :options="$group->filters()->pluck('title','id')"  wire:model.defer="selectedFilters.{{$group->id}}.filter_id"/>
					@endforeach
				</div>
				<x-admin.forms.dropdown id="detail_display" label="نمایش جزئیات" :options="$data['detail_display']" required="true" wire:model.defer="detail_display"/>


                <x-admin.forms.input type="text" id="seo_keywords" label="کلمات کلیدی سئو" required="true" help="کلمات کلیدی را با کاما از هم جدا کنید" wire:model.defer="seo_keywords"/>
                <x-admin.forms.input type="text" id="seo_description" label="توضیحات سئو" required="true" wire:model.defer="seo_description"/>
				<x-admin.forms.textarea  id="seo_questions" label="سوالات سئو" help="سوال ها را با | از هم جدا کنید"  wire:model.defer="seo_questions"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="مدیر محصول"/>
                <x-admin.forms.input type="text" id="manager_mobile" label="موبایل مدیران محصول" help="موبایل ها را با کاما از هم جدا کنید" wire:model.defer="manager_mobile"/>
				<x-admin.forms.checkbox id="manager_sms" value="1" wire:model.defer="manager_sms">ارسال اس ام اس برای مدیر محصول</x-admin.forms.checkbox>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="تخفیف محصول"/>
                <x-admin.forms.dropdown id="discount_type" label="نوع تخفیف" :options="$data['discount_type']" required="true" wire:model.defer="discount_type"/>
                <x-admin.forms.input type="number" id="discount_amount" label="میزان تخفیف" required="true" wire:model.defer="discount_amount"/>
                <x-admin.forms.datepicker type="text" id="discount_starts_at" label="تاریخ شروع" help="در صورت خالی بودن محدودیتی در تاریخ شروع ندارد" wire:model.defer="discount_starts_at"/>
                <x-admin.forms.datepicker type="text" id="discount_expires_at" label="تاریخ پایان" help="در صورت خالی بودن محدودیتی در انقضاء شروع ندارد" wire:model.defer="discount_expires_at"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="فرم" class="d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-link" wire:click="addForm('speedPlus')">speedPlus</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('paragraph')">paragraph</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('customRadio')">customRadio</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('radio')">radio</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('select')">select</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('textArea')">textArea</button>
                        <button type="button" class="btn btn-link" wire:click="addForm('text')">text</button>
						<button type="button" class="btn btn-link" wire:click="addForm('range')">range</button>
						<button type="button" class="btn btn-link" wire:click="addForm('help')">help</button>
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
		function copy(text)
		{
			@this.call('copyLicenses',text)
		}
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
		function crackHash()
		{
			Swal.fire({
			title: 'گذرواژه را وارد نمایید',
			input: 'password',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			confirmButtonText: 'بررسی',
			showLoaderOnConfirm: true,
			preConfirm: (login) => {
				@this.call('checkPassword',login)
			},
			allowOutsideClick: () => !Swal.isLoading()
			}).then((result) => {
			})
		}

		Livewire.on('verify-code', data => {
			Swal.fire({
				title: 'کد ارسال شده را وارد نمایید',
				input: 'password',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'بررسی',
				showLoaderOnConfirm: true,
				preConfirm: (login) => {
					@this.call('checkCode',login)
				},
				allowOutsideClick: () => !Swal.isLoading()
				}).then((result) => {
			})
    	})

        function deleteLicenseItem(id) {
            Swal.fire({
                title: 'حذف لاینسیس!',
                text: 'آیا از حذف لاینسیس اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deleteLicense', id)
                }
            })
        }
    </script>
@endpush