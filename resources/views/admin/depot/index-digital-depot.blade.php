<div wire:init="getNumber">
    <x-admin.subheader title="انبار" :mode="$mode" :create="false"  />
	@if (session()->get("depot-verify",false))
	 
    <div class="content d-flex flex-column-fluid">
        <div class="container">
			<x-admin.modal id="storeDepot" size="modal-xl" title="{{$title}}">
                <div>
                <x-admin.forms.validation-errors/>
			 @error('none')
					<small class="text-red">{{ $message }}</small>
				@enderror
            	</div> 
                <x-admin.forms.input type="text" id="product2" label="ای دی یا عنوان محصول" required="true" wire:input="searchKeyword()" wire:model="product" />
				<div class="col-lg-12">
				@foreach($guest as $key => $item)
					<button class="btn btn-link" wire:click="setSearch('{{$key}}')">{{ $item }}-(id:{{$key}})</button>
				@endforeach
				</div>
				<br>
				<x-admin.forms.input type="number" id="price2" label="(تومان)قیمت خرید" required="true" wire:model.defer="price"/>
				@if($action == 'exit')
					<x-admin.forms.input type="number" id="exit_price2" label="قیمت فروش(تومان)" required="true" wire:model.defer="exit_price"/>
					<x-admin.forms.input type="number" id="track_id2" label="کد سفارش"  wire:model.defer="track_id"/>
					<h2 class="my-2">لایسنس های اماده استفاده :</h2>
					<div class="table-responsive col-12 p-4">
						<table class="table table-striped">
							<thead>
							<tr>
								<th>#</th>
								<th>عنوان</th>
							</tr>
							</thead>
							<tbody>
							@forelse($product_license as $key => $item)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td oncopy="copy('{{$item}}')">
										
										{{ $item}}
									
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
					<x-admin.forms.input type="number" id="count3" label="تعداد"  wire:model.defer="count2"/>
				@endif
			
				@if($action == 'enter')
					<x-admin.forms.textarea id="licenses"  label="لاینسیس ها" help="لاینسیس ها را با کاما از هم جدا کنید" wire:model.defer="licenses"/>
					<x-admin.forms.dropdown id="status2" disabled label="وضعیت" :options="$statuses" required="true" wire:model.defer="status"/>
				@endif
				<x-admin.forms.dropdown id="category2" disabled label="دسته بندی" :options="$data" required="true" wire:model.defer="category"/>
				<x-admin.forms.lfm-standalone id="media2" disabled label="تصویر" :image="$media" wire:model="media"/>
				<x-admin.forms.textarea id="description2" label="توضیحات"  wire:model.defer="description"/>
                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="storeDepot()">ثبت</button>
                   
                </x-slot>
            </x-admin.modal>
			<x-admin.modal id="showDetails" size="modal-xl" title="جزئیات محصول">
				<!-- <div class="col-12">
					<button wire:click="$set('license_tab','not_used')" class="btn btn-sm btn-info">ایسنس های قابل استفاده</button>
					<button wire:click="$set('license_tab','used')" class="btn btn-sm btn-info">لایسنس های استفاده شده</button>
					<button wire:click="$set('license_tab','deleted')" class="btn btn-sm btn-info">لایسنس های حذف شده</button>
				</div> -->
            	<div>
					<h2 class="my-2">{{$product_name}}</h2>
				<div class="col-12 p-4">
				<h2 class="my-2">تاریخچه ورودی</h2>
				@foreach($enter_price as $key => $price)
						<div class="col-12 border">
						<p class="p-2">{{ $loop->iteration }} # تعداد {{ $price->count }} عدد به قیمت {{ number_format((int)$price->price) }} تومان  </p>
						</div>
													
					@endforeach
				</div>
				<hr>
				<div class="col-12 p-4">
				<h2 class="my-2">یادداشت ها</h2>
				@foreach($notes as $key => $item)
						@if(!empty($item->description))
						<div class="col-12 border">
							<p class="p-2">{{$item->description}}</p>
							<small class="text-info">{{jalaliDate($item->updated_at, '%d %B %Y')}}</small>
						</div>
						@endif
					@endforeach
					</div>
				</div>
				
				
				<h2 class="my-2">لایسنس های قابل استفاده</h2>
				<div class="table-responsive col-12 p-4">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($product_license as $key => $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
									
									{{ $item }}
								
								</td>
                                <td>
									<x-admin.delete-table onclick="deleteLicenseItem({{$key}})"/>
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
                </div>

              <x-slot name="footer">
                    
                   
                </x-slot>
            </x-admin.modal>
			<x-admin.modal id="editDepot" size="modal-xl" title="{{$title}}">
                <div>
                <x-admin.forms.validation-errors/>
			 	@error('none')
					<small class="text-red">{{ $message }}</small>
				@enderror
            	</div> 
                <x-admin.forms.input type="text" id="product" disabled label="ای دی یا عنوان محصول" required="true" wire:input="searchKeyword()" wire:model="product" />
				<div class="col-lg-12">
				@foreach($guest as $key => $item)
					<button class="btn btn-link" wire:click="setSearch('{{$key}}')">{{ $item }}-(id:{{$key}})</button>
				@endforeach
				</div>
				<br>
				<x-admin.forms.input type="number" id="price" label="(تومان)قیمت خرید" required="true" wire:model.defer="price"/>
				<x-admin.forms.input type="number" id="count2" label="تعداد" required="true" wire:model.defer="count"/>
				@if($action == 'exit')
					<x-admin.forms.input type="number" id="exit_price" label="قیمت فروش(تومان)" required="true" wire:model.defer="exit_price"/>
					<x-admin.forms.input type="number" id="track_id" label="کد سفارش"  wire:model.defer="track_id"/>
				@endif
				@if($action == 'enter')

					<x-admin.forms.dropdown id="status" disabled label="وضعیت" :options="$statuses" required="true" wire:model.defer="status"/>
				@endif
				<x-admin.forms.dropdown id="category" disabled label="دسته بندی" :options="$data" required="true" wire:model.defer="category"/>
				<x-admin.forms.lfm-standalone id="media" disabled label="تصویر" :image="$media" wire:model="media"/>
				@if($action == 'exit')
					<x-admin.forms.textarea id="description" label="توضیحات"  wire:model.defer="description"/>
				@endif
                <x-slot name="footer">
                    <button type="button" class="btn btn-primary" wire:click="storeItem()">ثبت</button>
                    
                </x-slot>
				
            </x-admin.modal>
          <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
						<div class="col-md-8 col-sm-12">
                            <button class="btn btn-primary" wire:click="$set('tab','depot')">انبار</button>
							<button class="btn btn-primary" wire:click="$set('tab','report')">گزارشات</button>
							
                        </div>
                        <div class="col-md-4 col-sm-12 text-left">
                            <button class="btn btn-success" wire:click="addStoreDepot('فرم ورود')">فرم ورود</button>
							<button class="btn btn-danger" wire:click="addStoreDepot('فرم خروج')">فرم خروج</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    @include('admin.components.advanced-table')
					<x-admin.forms.dropdown id="category_id" label="دسته" :options="$data" wire:model="cat"/>
					 <x-admin.forms.input type="text" id="order_id" label="کد سفارش"  wire:model="order_id" />
					<x-admin.forms.dropdown id="product_status" label="وضعیت" :options="$statuses" wire:model="product_status"/>
					@if($tab == 'report')
					<div class="row">
						<div class="col-md-8 col-sm-12">
							<button class="btn btn-outline-primary" wire:click="$set('report','products')">محصولات</button>
							<button class="btn btn-outline-primary" wire:click="$set('report','enter')">ورودی</button>
							<button class="btn btn-outline-primary" wire:click="$set('report','exit')">خروجی</button>
                        </div>
                    </div>
					@endif
                    <div class="row">
						@if($tab == 'depot')
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>انبار</h3>
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th>عنوان</th>
										<th>تعداد</th>
										<th>دسته بندی</th>
										<th>قیمت خرید</th>
										<th>سرمایه کل</th>
										<th>وضعیت</th>
										<th>تاریخ</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									@forelse($all as $item)
										<tr>
											<td>{{iteration($loop, $perPage)}}</td>
											<td>{{@$item->product->title}}</td>
											<td>{{$item->product->licenses ? @$item->product->licenses->where('is_used',0)->count() : ''}}</td>
											<td>{{@$item->categories->title}}</td>
											<td>
											@foreach($item->price as $key => $price)
												@if($key > 5)
													@break
												@endif	

												<p class="p-2">تعداد {{ $price->count }} عدد به قیمت {{ number_format((int)$price->price) }} </p>
												<hr>
											@endforeach
											</td>
											<td>{{ number_format($item->fund) }} تومان</td>
											<td>{{$item->product->status_label}}</td>
											<td>{{jalaliDate($item->created_at, '%d %B %Y %H:%m')}}</td>
											<td>
												<x-admin.edit-table wire:click="showDetails({{$item->id}})"/>
												<x-admin.delete-table onclick="deleteItems({{$item->id}})"/>
											</td>
										</tr>
										@empty
											<td class="text-center" colspan="9">
												دیتایی جهت نمایش وجود ندارد
											</td>
										@endforelse
									<tr>
									</tr> 
									</tbody>
								</table>
							</div>
							{{ $all->links('admin.components.pagination') }}
						</div>
						@elseif($report == 'enter' || is_null($report))
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>ورودی</h3>
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th>عنوان</th>
										<th>دسته بندی</th>
										<th>توسط</th>
										<th>تعداد</th>
										<th>قیمت خرید</th>
										<th>توضیحات</th>
										<th>لایسنس ها</th>
										<th>تاریخ</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									@forelse($enter as $item)
									<tr>
										<td>{{iteration($loop, $perPage)}}</td>
										<td>{{@$item->depotItem->product->title}}</td>
										<td>{{@$item->categories->title}}</td>
										<td>{{@$item->user->name.' '.@$item->user->family}}</td>
										<td>{{@$item->count}}</td>
										<td>{{@$item->price ? number_format($item->price).' تومان' : '-'}}</td>
										<td>{{@$item->description}}</td>
										<td>
											{{@$item->licenses}}
										</td>
										<td>{{jalaliDate($item->created_at, '%d %B %Y %H:%m')}}</td>
										<td>
											<x-admin.edit-table wire:click="editCase({{$item->id}})"/>
                                         	<x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
                                    	</td>
									</tr>
									@empty
										<td class="text-center" colspan="10">
											دیتایی جهت نمایش وجود ندارد
										</td>
									@endforelse
									<tr>
									</tr>
									</tbody>
								</table>
							</div>
							{{ $enter->links('admin.components.pagination') }}
						</div>
						@elseif($report == 'exit')
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>خروجی</h3>
								<table class="table table-striped">
									<thead>
									<tr>
										<th>#</th>
										<th>عنوان</th>
										<th>کد سفارش</th>
										<th>دسته بندی</th>
										<th>توسط</th>
										<th>تعداد</th>
										<th>تاریخ</th>
										<th>قیمت خرید</th>
										<th>قیمت فروش</th>
										<th>کد سفارش</th>
										<th>توضیحات</th>
										<th>لایسنس ها</th>
										<th>عملیات</th>
									</tr>
									</thead>
									<tbody>
									@forelse($exit as $item)
										<tr>
											<td>{{iteration($loop, $perPage)}}</td>
											<td>{{@$item->depotItem->product->title}}</td>
											<td>{{@$item->track_id}}</td>
											<td>{{@$item->categories->title}}</td>
											<td>{{@$item->user->name.' '.@$item->user->family}}</td>
											<td>{{@$item->count}}</td>
											<td>{{jalaliDate($item->created_at, '%d %B %Y %H:%m')}}</td>
											<td>{{number_format(@$item->price)}}</td>
											<td>{{number_format(@$item->exit_price)}}</td>
											<td>{{ $item->track_id ?? '' }}</td>
											<td>{{@$item->description}}</td>
											<td>
											{{@$item->licenses}}
											</td>
											<td>
											 	<x-admin.edit-table wire:click="editCase({{$item->id}})"/>
												<x-admin.delete-table onclick="deleteItem({{$item->id}})"/>
												<div style="display: inline-block;background: #f3f6f9;width: 35px;height: 33px;position: relative;top: 5px;right: -7px;border-radius: 4px;">
										<a href="{{ route('admin.factor',['id' => $item->id]) }}">
											<i data-container="body" data-toggle="popover" data-placement="top"
                                         class="flaticon-eye fa-2x" style=" top: 1px;position: relative;left: -4px;"></i>

										 
										</a>
										</div>
										
											</td>
										</tr>
										@empty
											<td class="text-center" colspan="12">
												دیتایی جهت نمایش وجود ندارد
											</td>
										@endforelse
									<tr>
									</tr> 
									</tbody>
								</table>
							</div>
							{{ $exit->links('admin.components.pagination') }}
						</div>
						@elseif($report == 'products')
						<div class="col-lg-12">
							<div class="table-responsive">
								<br>
								<h3>محصولات</h3>
								
								<table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>قیمت</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($products as $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td><a href="{{route('products.show', $item->slug)}}">{{$item->title}}</a></td>
                                    <td>{{number_format($item->price)}} تومان</td>
                                    <td>{{$item->status_label}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.products.store',
                                            ['action'=>'edit', 'id' => $item->id])}}"/>
                                       
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
							{{ $products->links('admin.components.pagination') }}
						</div>
						@endif
					</div>
                  
                </div>
            </div>
        </div>
    </div>
	@endif
</div>
@push('scripts')
    <script>

        function deleteItem(id) {
            Swal.fire({
                title: 'حذف کالا!',
                text: 'آیا از حذف کالا اطمینان دارید؟',
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
		function deleteItems(id) {
            Swal.fire({
                title: 'حذف کالا!',
                text: 'آیا از حذف کالا اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deletes', id)
                }
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

		Livewire.on('getNumber', data => {
			Swal.fire({
			title: 'شماره را وارد نمایید',
			input: 'text',
			inputAttributes: {
				autocapitalize: 'off'
			},
			showCancelButton: true,
			confirmButtonText: 'بررسی',
			showLoaderOnConfirm: true,
			preConfirm: (login) => {
				@this.call('verify',login)
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