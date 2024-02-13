<div>
    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <x-admin.modal id="imageWithUrl" size="modal-xl" title="افزودن آیتم">
                <div>
                <x-admin.forms.validation-errors/>
            </div>
				
                <x-admin.forms.input type="text" id="url" label="آدرس" required="true" wire:model.defer="url"/>
                <x-admin.forms.lfm-standalone id="image" label="تصویر" :image="$image" required="true" wire:model="image"/>

                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="storeImageWithUrl()">ثبت</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
                </x-slot>
            </x-admin.modal>

            <x-admin.subheader title="تنظیمات" :mode="$mode" :createAble="false"/>

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="تنظیمات" :mode="$mode">
				<div class="form-group col-12">
					<h3>پنل اینکس</h3>
					<h5>موجودی : {{number_format($charge).' تومان'}}</h5>
					<div class="d-flex">
					<input wire:model.defer="addCharge" class="form-control col-3" placeholder="مبلغ افزایش موجودی (تومان)">
					<button class="btn btn-success col-1" type="button" wire:click="chargePanel()">پرداخت</button>
					</div>
					<small>حداقل مبلغ 1000 تومان</small>
					<br>
				</div>	
				<div class="form-group col-12">
					<label>وضعیت سایت</label>
					<select class="form-control" wire:model.defer="site_close">
					<option {{ $site_close == "0" ? 'selected' : '' }} value="0"> باز</option>
					<option {{ $site_close == "1" ? 'selected' : '' }} value="1">بسته</option>
					</select>
				</div>	
				<x-admin.forms.input type="text" id="depot_password" label="شماره های انبار ها" required="true" help="شماره هارا با کاما از هم جدا کنید" wire:model.defer="depot_password"/>
				@if(in_array(auth()->user()->mobile ,['09336332901','09931788937','09921757351','09010235494']))
				<x-admin.forms.input dir="ltr" type="text" id="passwords" label="گذرواژه های لایسنس ها" required="true" help="کذرواژه هارا با کاما از هم جدا کنید" wire:model.defer="passwords"/>
				@endif
				<x-admin.forms.checkbox id="lottery" value="1" wire:model.defer="lottery">شروع قرعه کشی</x-admin.forms.checkbox>
				<x-admin.forms.datepicker type="text" id="start_lottery" label="تاریخ شروع قرعه کشی" help="در صورت خالی بودن محدودیتی در تاریخ شروع ندارد" wire:model.defer="start_lottery"/>
                <x-admin.forms.input type="text" id="top_alert" label="اعلان بالای صفحه" required="true" wire:model.defer="top_alert"/>
				<x-admin.forms.input type="text" id="admin_numbers" label=" ارسال پیامک اتمام موجودی لایسنس" help="شماره هارا با کاما از هم جدا کنید" required="true" wire:model.defer="admin_numbers"/>
                <x-admin.forms.lfm-standalone id="auth_image" label="تصویر صفحه لاگین" :image="$auth_image" required="true" wire:model="auth_image"/>
                <x-admin.forms.input type="text" id="register_wallet" label="هدیه ثبت نام" required="true" wire:model.defer="register_wallet"/>
                <x-admin.forms.input type="text" id="score_to_wallet" label="تبدیل امتیاز به کیف پول" required="true" wire:model.defer="score_to_wallet"/>
                <x-admin.forms.input type="text" id="address" label="آدرس" required="true" wire:model.defer="address"/>
                <x-admin.forms.input type="text" id="email" label="ایمیل" required="true" wire:model.defer="email"/>
                <x-admin.forms.input type="text" id="phone" label="تلفن" required="true" wire:model.defer="phone"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="درخواست همکاری"/>
                <x-admin.forms.textarea id="cooperation_request_description" label="توضیحات درخواست همکاری با ما" required="true" wire:model="cooperation_request_description"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="درباره ما"/>
                <x-admin.forms.textarea id="contant_us_description" label="توضیحات درباره ما" required="true" wire:model="contact_us_description"/>
                <x-admin.forms.lfm-standalone id="contact_us_slider" label="اسلایدر درباره ما" :image="$contact_us_slider"
                                              :preview="$contact_us_slider" required="true" wire:model.defer="contact_us_slider"/>

				
				<x-admin.forms.lfm-standalone id="auth_image_pattern" label="تصویر نمونه احراز هویت" :image="$auth_image_pattern"
                                              :preview="$auth_image_pattern" required="true" wire:model="auth_image_pattern"/>		
				<x-admin.forms.textarea  id="auth_description" required="true" label="توضیحات احراز هویت"   wire:model.defer="auth_description"/>							  					  
				<x-admin.forms.header title="موضوعات تیکت"/>	
				<div>
				<button class="btn btn-success" type="button" wire:click="addSubject()">افزودن موضوع</button>						  
				@foreach($subject as $key => $item)
                    <div class="form-group" style="display: flex;align-items: center">
                        <div style="padding: 5px">
                            <input class="form-control" id="{{ $key }}subject" type="text" placeholder="عنوان" wire:model.defer="subject.{{$key}}">
                        </div>
                        <div><button class="btn btn-danger" wire:click="deleteSubject({{ $key }})">حذف</button></div>
                    </div>
                @endforeach			
				</div.				  
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