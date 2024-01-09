<div>
			<x-admin.modal id="addMoney" size="modal-xl" title="واریز ارز">
                <div>
					<x-admin.forms.validation-errors/>
					<x-admin.forms.dropdown id="currency_id" label="ارز" :options="$currencies->pluck('title','id')" wire:model.defer="currency_id"/>
					<x-admin.forms.input type="number" id="currency_count" label="تعداد" required="true" wire:model.defer="currency_count"/>
					<x-admin.forms.input type="number" id="currency_price" label="(تومان)قیمت خرید" required="true" wire:model.defer="currency_price"/>
					<x-slot name="footer">
						<button type="button" class="btn btn-primary" wire:click="storeMoney()">ثبت</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
					</x-slot>
				</div>
            </x-admin.modal>
			<x-admin.modal id="withrawMoney" size="modal-xl" title="برداشت ارز">
                <div>
					<x-admin.forms.validation-errors/>
					<x-admin.forms.dropdown id="currency_id" label="ارز" :options="$currencies->pluck('title','id')" wire:model.defer="currency_id"/>
					<x-admin.forms.input type="number" id="currency_count" label="تعداد" required="true" wire:model.defer="currency_count"/>
					<x-admin.forms.input type="number" id="currency_price" label="(تومان)قیمت خرید" required="true" wire:model.defer="currency_price"/>
					<x-admin.forms.select2 id="currency_product" label="محصول" :data="$data['product']" wire:model.defer="currency_product"/>
					
					
					<x-admin.forms.textarea  id="currency_description" label="توضیحات"  wire:model.defer="currency_description"/>
					<x-slot name="footer">
						<button type="button" class="btn btn-primary" wire:click="storeWithrawMoney()">ثبت</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
					</x-slot>
				</div>
            </x-admin.modal>
			<x-admin.modal id="editHistory" size="modal-xl" title=" ویرایش">
                <div>
					<x-admin.forms.validation-errors/>
					<x-admin.forms.dropdown id="edit_currency_id" label="ارز" :options="$currencies->pluck('title','id')" wire:model.defer="edit_currency_id"/>
					<x-admin.forms.input type="number" id="edit_currency_count" label="تعداد" required="true" wire:model.defer="edit_currency_count"/>
					<x-admin.forms.input type="number" id="edit_currency_price" label="(تومان)قیمت خرید" required="true" wire:model.defer="edit_currency_price"/>
					<x-admin.forms.textarea  id="edit_currency_description" label="توضیحات"  wire:model.defer="edit_currency_description"/>
					<x-slot name="footer">
						<button type="button" class="btn btn-primary" wire:click="storeEditItems()">ثبت</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button>
					</x-slot>
				</div>
            </x-admin.modal>
	<x-admin.subheader title="کیف پول ارز " :mode="$mode" :create="false"/>

	<div class="content d-flex flex-column-fluid">
		<div class="container">

			<div class="card mb-5">
                <div class="card-body">
                    <div class="row">
						<div class="col-md-8 col-sm-12">
                           
							
                        </div>
                        <div class="col-md-4 col-sm-12 text-left">
                            <button class="btn btn-success" wire:click="addMoney()">واریز ارز</button>
							<button class="btn btn-success" wire:click="withrawMoney()">برداشت ارز</button>
                        </div>
                    </div>
                </div>
            </div>

			<div class="card">
				<div class="card-body">
					@include('admin.components.advanced-table')
					<x-admin.forms.dropdown id="currency" label="ارز" :options="$currencies->pluck('title','id')" wire:model="currency"/>
					<div class="form-group col-12">
                        <label for="category">دسته بندی</label>
                        <select id="category" class="form-control" wire:model="category">
                            <option value="" selected>انتخاب کنید...</option>
                            @foreach($mainCategories as $category)
                                <option value="{{$category->id}}" class="h5">{{$category->title}}</option>
                                @foreach($category->subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}">{{$subCategory->title}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @isset($help)
                            <small class="text-muted">{{$help}}</small>
                        @endisset
                    </div>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<h3>موجودی</h3>
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>ارز</th>
											<th>موجودی</th>
											<th>ارزش موجودی</th>
										</tr>
									</thead>
									<tbody>
									@foreach($currencies as $item)
									<tr>
										<td>{{iteration($loop, $perPage)}}</td>
										<td>{{$item->title}}</td>
										<td>{{ $item->history->sum('count') }}</td>
										<td>{{ number_format( $item->fund) }} تومان</td>
									</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="table-responsive">
								<h3>تاریخچه واریز/برداشت</h3>
								<div class="col-12 p-4">
									<button class="btn btn-success" wire:click="$set('tab','deposit')">واریز</button>
									<button class="btn btn-danger" wire:click="$set('tab','harvest')">برداشت</button>
									<button class="btn btn-danger" wire:click="$set('tab','deleted')">حذف شدها</button>
									<button class="btn btn-info" wire:click="$set('tab','')">همه</button>
								</div>
								@if($tab == 'deleted')
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>ارز</th>
											<th>تعداد</th>
											<th>قیمت </th>
											<th>ثبت شده توسط </th>
											<th>حذف شده توسط </th>
											<th> تاریخ حذف</th>
											<th>محصول</th>
											<th>قیمت کل</th>
											<th>تراکنش</th>
											<th>توضیحات</th>
											
										</tr>
									</thead>
									<tbody>
									@foreach($currencies_row as $item)
									<tr>
										<td>{{iteration($loop, $perPage)}}</td>
										<td>{{ !is_null($item->currency) ? $item->currency->title : '-' }}</td>
										<td>{{$item->count}}</td>
										<td>{{ number_format($item->amount) }} تومان</td>
										<td>{{$item->user->username}}</td>
										<td>{{ $item->user_deleted ? $item->user_deleted->username : ''}}</td>
										<td>{{jalaliDate($item->deleted_at, '%d %B %Y - %H:%M:%S')}}</td>
										<td>{{$item->product ?? '-'}}</td>
										<td>{{ number_format($item->amount*$item->count) }} تومان</td>
										<td>{{$item->count > 0 ? 'واریز' : 'برداشت'}}</td>
										<td>{{$item->description ?? '-'}}</td>
										
									
									</tr>
									@endforeach
									</tbody>
								</table>
								@else
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>ارز</th>
											<th>تعداد</th>
											<th>قیمت </th>
											<th>توسط </th>
											<th>تاریخ</th>
											<th>محصول</th>
											<th>قیمت کل</th>
											<th>تراکنش</th>
											<th>توضیحات</th>
											<th>عملیات</th>
										</tr>
									</thead>
									<tbody>
									@foreach($currencies_row as $item)
									<tr>
										<td>{{iteration($loop, $perPage)}}</td>
										<td>{{ !is_null($item->currency) ? $item->currency->title : '-' }}</td>
										<td>{{$item->count}}</td>
										<td>{{ number_format($item->amount) }} تومان</td>
										<td>{{$item->user->username}}</td>
										<td>{{jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')}}</td>
										<td>{{$item->product ?? '-'}}</td>
										<td>{{ number_format($item->amount*$item->count) }} تومان</td>
										<td>{{$item->count > 0 ? 'واریز' : 'برداشت'}}</td>
										<td>{{$item->description ?? '-'}}</td>
										
										<td>
											<x-admin.edit-table wire:click="editItems({{$item->id}})"/>
											<x-admin.delete-table onclick="deleteItems({{$item->id}})"/>
										</td>
									</tr>
									@endforeach
									</tbody>
								</table>
								@endif
							</div>
							{{ $currencies_row->links('admin.components.pagination') }}
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
@push('scripts')
    <script>


		function deleteItems(id) {
            Swal.fire({
                title: 'حذف ردیف!',
                text: 'آیا از حذف ردیف اطمینان دارید؟',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'خیر',
                confirmButtonText: 'بله'
            }).then((result) => {
                if (result.value) {
                @this.call('deleteItems', id)
                }
            })
        }
    </script>
@endpush