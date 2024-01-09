<div>
    <x-admin.subheader title="کاربران" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div>
                <x-admin.forms.validation-errors/>
            </div>

            <x-admin.forms.form title="کاربر" :mode="$mode">
				@if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))
                <x-admin.forms.input id="title" type="text" label="نام" required="true" wire:model.defer="name"/>
                <x-admin.forms.input id="title" type="text" label="نام خانوادگی" required="true" wire:model.defer="family"/>
                <x-admin.forms.input id="title" type="text" label="نام کاربری" required="true" wire:model.defer="username"/>
				<x-admin.forms.input id="phone" type="text" label="شماره" required="true" wire:model.defer="phone"/>
				<x-admin.forms.input id="password" type="password" label="پسورد" required="false" wire:model.defer="password"/>
				<x-admin.forms.datepicker type="text" id="manager_start_date" label="تاریخ محاسبه مستندات مدیر محصول" wire:model.defer="manager_start_date"/>
				<div class="form-group col-12">
					<x-admin.forms.checkbox id="must_login_by_sms" col="2" value="1" wire:model.defer="must_login_by_sms">
						لاگین با SMS
					</x-admin.forms.checkbox>
				</div>
                <div class="form-group col-6">
                    <p>موبایل : {{$mobile}}</p>
                </div>
                <div class="form-group col-6">
                    <p>ایمیل : {{$email}}</p>
                </div>
                <div class="form-group col-6">
                    <p>نام صاحب حساب : {{$account_name}}</p>
                </div>
                <div class="form-group col-6">
                    <p>نام بانک : {{$account_bank}}</p>
                </div>
                <div class="form-group col-6">
                    <p>شماره کارت : {{$account_cart}}</p>
                </div>
                <div class="form-group col-6">
                    <p>شماره شبا : {{$account_sheba}}</p>
                </div>
				<x-admin.forms.dropdown id="language" label="زبان" :options="$langs" required="true" wire:model.defer="language"/>
                <x-admin.forms.separator/>
                <x-admin.forms.header title="نقش کاربر"/>
                @foreach($data['role'] as $item)
                    <x-admin.forms.checkbox id="permissions-{{$item['id']}}" col="2" value="{{$item['name']}}" wire:model.defer="roles">
                        {{$item['name']}}
                    </x-admin.forms.checkbox>
                @endforeach
				 <x-admin.forms.separator/>

				
				<x-admin.forms.header title="احراز هویت کاربر"/>
				
				<img style="max-width:300px;" class="p-5" src="{{ asset('media/'.$model->file) }}">
				<br>
				<img style="max-width:300px;" class="p-5" src="{{ asset('cart/'.$model->file) }}">
				<br>
				<x-admin.forms.dropdown id="auth_status" label="وضیعت" :options="$data['auth_status']" required="true" wire:model.defer="auth_status"/>
				<x-admin.forms.textarea id="auth_result" label="توضیح" required="true" wire:model.defer="auth_result"/>
				<div class="form-group col-12">
                    <button type="button" class="btn btn-secondary" wire:click="auth">ثبت اطلاعات</button>
                </div>


				 <x-admin.forms.separator/>

                <x-admin.forms.header title="دسترسی کاربر"/>
			<div class="row">
				@foreach($model->getAllPermissions() as $item)
					<div class="form-group col-2">
					{{ $item->name }}
					</div>
				@endforeach
			</div>
			@else
			
				<x-admin.forms.input id="title" disabled type="text" label="نام" required="true" wire:model.defer="name"/>
                <x-admin.forms.input id="title" disabled type="text" label="نام خانوادگی" required="true" wire:model.defer="family"/>
                <x-admin.forms.input id="title" disabled type="text" label="نام کاربری" required="true" wire:model.defer="username"/>
				<x-admin.forms.input id="phone" disabled type="text" label="شماره" required="true" wire:model.defer="phone"/>
		


                <x-admin.forms.separator/>
			@endif
				<x-admin.forms.header title="مدیریت برنامه کاربران" class="d-flex justify-content-between">

				</x-admin.forms.header>
 					<table class="table-bordered table table-striped">
                        <thead>
                            <tr>
                                <th>شنبه</th>
                                <th>یکشنبه</th>
                                <th>دوشنبه</th>
                                <th>سه شنبه</th>
                                <th>چهار شنبه</th>
                                <th>پنج شنبه</th>
                                <th> جمعه</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><x-admin.forms.input type="text" id="saturday" placeholder="08:00-15:30" label="" wire:model.defer="saturday"/></td>
                            <td><x-admin.forms.input type="text" id="sunday" placeholder="08:00-15:30" label="" wire:model.defer="sunday"/></td>
                            <td><x-admin.forms.input type="text" id="monday" placeholder="08:00-15:30" label="" wire:model.defer="monday"/></td>
                            <td><x-admin.forms.input type="text" id="tuesday" placeholder="08:00-15:30" label="" wire:model.defer="tuesday"/></td>
                            <td><x-admin.forms.input type="text" id="wednesday" placeholder="08:00-15:30" label="" wire:model.defer="wednesday"/></td>
                            <td><x-admin.forms.input type="text" id="thursday" placeholder="08:00-15:30" label="" wire:model.defer="thursday"/></td>
                            <td><x-admin.forms.input type="text" id="friday" placeholder="08:00-15:30" label="" wire:model.defer="friday"/></td>
                        </tr>
                        </tbody>
                    </table>

				<x-admin.forms.separator/>

				<x-admin.forms.header title="اضافه کاری ها" class="d-flex justify-content-between">

				</x-admin.forms.header>
				 <div class="col-6">
                            <x-admin.forms.date-picker id="start_at" label="از تاریخ"   wire:model.defer="start_at"/>
                        </div>
                        <div class="col-6">
                            <x-admin.forms.date-picker id="end_at" label="تا تاریخ"   wire:model.defer="end_at"/>
                        </div>
                        <div class="col-12 mt-2">
							<div class="form-group col-12">
                    			<button type="button" class="btn btn-secondary" wire:click="newOverTime()">ثبت ضافه کاری</button>
                			</div>
                        </div>
										<x-admin.forms.separator/>
				@if(!empty($model->partnerDetail))						
				<x-admin.forms.header title="مشخصات پنل همکاری" class="d-flex justify-content-between">
				</x-admin.forms.header>
				<div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>تلگرام</th>
                            <th>ایسنتاگرام</th>
							<th>موبایل</th>
							<th>نام فورشگاه</th>
							<th>ادرس فروشگاه</th>
							<th>پشتیبانی1</th>
							<th>پشتیبانی2</th>
							<th>پشتیبانی3</th>
                        </tr>
                        </thead>
                        <tbody >
                        	<tr>
                                <td>{{$model->partnerDetail->first_name  }}</td>
								<td>{{$model->partnerDetail->last_name  }}</td>
								<td>{{$model->partnerDetail->telegram  }}</td>
								<td>{{$model->partnerDetail->instagram  }}</td>
								<td>{{$model->partnerDetail->phone  }}</td>
								<td>{{$model->partnerDetail->site_name  }}</td>
								<td>{{$model->partnerDetail->site_url  }}</td>
								<td>{{$model->partnerDetail->support_phone1  }}</td>
								<td>{{$model->partnerDetail->support_phone2  }}</td>
								<td>{{$model->partnerDetail->support_phone3  }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
				@endif
					<x-admin.forms.separator/>
				<x-admin.forms.header title="تاریخچها" class="d-flex justify-content-between">

				</x-admin.forms.header>
				<table class="table-bordered table table-striped">
                            <thead>
                            <tr>
                                <th>از تاریخ</th>
                                <th>تا تاریخ</th>
                                <th>مسئول</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody wire:sortable="updateFormPosition()">
                            @forelse($overtimes as $item)
                                <tr>
                                    <td>{{ jalaliDate($item->start_at,'%d %B %Y - H:i:s') }}</td>
                                    <td>{{ jalaliDate($item->end_at,'%d %B %Y - H:i:s') }}</td>
                                    <td>{{ $item->mangers->fullName ?? '' }}</td>
                                    <td>
                                       
										<x-admin.delete-table onclick="deleteOvertime({{$item->id}})"/>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">
                                        دیتایی جهت نمایش وجود ندارد
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
				
				@if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))

				

 				<x-admin.forms.separator/>

				 <x-admin.forms.header title="یادداشت ها" class="d-flex justify-content-between">
				 </x-admin.forms.header>
				<div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>متن</th>
                            <th>نویسنده</th>
                        </tr>
                        </thead>
                        <tbody >
                        @forelse($notes as $item)
                            <tr>
                                <td>
                                    <div class="comment__date">
                                        <span class="comment__date-day">{{jalaliDate($item->created_at, '%d')}}</span>
                                        <span class="comment__date-month">{{jalaliDate($item->created_at, '%B')}}</span>
                                    </div>
                                </td>
                                <td>{{$item->text}}</td>
                                <td>{{$item->author->name ?? null }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
					<x-admin.forms.textarea id="new_note" label="یادداشت جدید" required="true" wire:model.defer="new_note"/>
					<div class="form-group col-12">
						<button type="button" class="btn btn-secondary" wire:click="newNote">ثبت</button>
					</div>
                </div>

				 <x-admin.forms.separator/>
				 
                <x-admin.forms.header title="کیف پول" class="d-flex justify-content-between">
                    <div>
                        موجودی : {{number_format($model->balance ?? 0)}} تومان
                    </div>
                </x-admin.forms.header>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>تاریخ</th>
                            <th>مبلغ</th>
                            <th>نوع تراکنش</th>
                            <th>جزئیات</th>
                        </tr>
                        </thead>
                        <tbody wire:sortable="updateFormPosition()">
                        @forelse($userWallet as $item)
                            <tr>
                                <td>
                                    <div class="comment__date">
                                        <span class="comment__date-day">{{jalaliDate($item->created_at, '%d')}}</span>
                                        <span class="comment__date-month">{{jalaliDate($item->created_at, '%B')}}</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap">
                                <span class="flex items-center gap-1"><span class="font-semibold">{{number_format($item->amount)}}</span><span
                                            class="text-sm">تومان</span></span>
                                </td>
                                <td>{{$item->type == \Bavix\Wallet\Models\Transaction::TYPE_WITHDRAW ? 'برداشت' : 'واریز'}}</td>
                                <td>{{$item->meta['description']}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <x-admin.forms.dropdown id="wallet_type" label="نوع" :options="[\Bavix\Wallet\Models\Transaction::TYPE_WITHDRAW => 'برداشت',
                 \Bavix\Wallet\Models\Transaction::TYPE_DEPOSIT => 'واریز']" required="true" wire:model.defer="walletType"/>
                <x-admin.forms.input id="wallet_amount" type="number" label="مبلغ" required="true" wire:model.defer="walletAmount"/>
                <x-admin.forms.textarea id="wallet_description" label="توضیح" required="true" wire:model.defer="walletDescription"/>
                <div class="form-group col-12">
                    <button type="button" class="btn btn-secondary" wire:click="walletAction">ثبت</button>
                </div>
				@endif	

            </x-admin.forms.form>
			
        </div>
    </div>
</div>
@push('scripts')
    <script>
	function deleteOvertime(id) {
            Swal.fire({
                title: 'حذف اضافه کاری!',
                text: 'آیا از حذف این حذف اضافه کاری اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'موفیت امیز!',
                            'حذف حساب مورد نظر با موفقیت حذف شد',
                        )
                    }
                @this.call('deleteOverTimer', id)
                }
            })
        }
	</script>
@endpush