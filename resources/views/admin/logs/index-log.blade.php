<div>
    <x-admin.subheader title="لاگ" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
					@if($tab == 'logs' || !isset($tab))
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="user_id" label="شناسه" wire:model="filterId"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="user_id" label="شناسه کاربر" wire:model="filterUserId"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="subject_type" label="موضوع" wire:model="filterSubjectType"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="subject_id" label="شناسه موضوع" wire:model="filterSubjectId"/>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="description" label="عملیات" wire:model="filterDescription"/>
                        </div>
					@elseif ($tab == 'wallet')
						<div class="col-md-4 col-sm-12">
                            <x-admin.forms.input type="text" id="filterUserMobile" label="شماره کاربر" wire:model="filterUserMobile"/>
                        </div>
					@endif
                    </div>
					<div class="row">
						<div class="col-12">
						@if(Auth::user()->hasRole('super_admin'))
                           	<button wire:click="$set('tab','logs')" class="btn btn-primary">لاگ ها</button>
							<button wire:click="$set('tab','copies')" class="btn btn-primary">گزارش کپی ها</button>
							<button wire:click="$set('tab','hash')" class="btn btn-primary">هش ها</button>
							<button wire:click="$set('tab','wallet')" class="btn btn-primary">کیف پول</button>
						@endif
                        </div>
					</div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
				@if($tab == 'logs' || !isset($tab))
                    @include('admin.components.advanced-table', ['searchAble' => false])
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>شناسه</th>
                                <th>شناسه کاربر</th>
                                <th>موضوع</th>
                                <th>عملیات</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($logs as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>
                                        @if(is_null($item->causer_id))
                                            سیستم
                                        @else
                                            <a href="{{route('admin.users.store',['action'=>'edit', 'id' => $item->causer_id])}}"/>
                                            {{$item->causer_id}}
                                            </a>
                                        @endif
                                    </td>
                                    <td>{{$item->subject_type}} ({{$item->subject_id}})</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{jalaliDate($item->created_at, '%d %B %Y')}}</td>
                                    <td>
                                        <x-admin.edit-table href="{{route('admin.logs.show', $item->id)}}"/>
                                    </td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					@if(!empty($logs))
                   	 {{ $logs->links('admin.components.pagination') }}
					@endif
				@elseif($tab == 'copies' && Auth::user()->hasRole('super_admin'))
						@include('admin.components.advanced-table', ['searchAble' => true])
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
					 <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>شناسه</th>
								<th>محصول</th>
                                <th>توسط</th>
								<th>لایسنس</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            @forelse($copies as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->id}}</td>
									<td><a href="{{route('admin.products.store',['edit',$item->product->id])}}">{{$item->product->title}}</a></td>
                                    <td><a href="{{ route('admin.users.store',['edit',$item->user->id]) }}">{{$item->user->family ? ($item->user->name.' '.$item->user->family) : $item->user->username}}</a></td>
									<td>{{ $item->text }}</td>
                                    <td>{{jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')}}</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
					{{ $copies->links('admin.components.pagination') }}
				@elseif($tab == 'hash' && Auth::user()->hasRole('super_admin'))	
					<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>سفارش</th>
								<th>کاربر</th>
                                <th>وضعیت</th>
								<th>پسورد وارد شده</th>
                                <th>تاریخ</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            @forelse($requests as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->order_id ?? 'صفحه محصول'}}</td>
									<td>{{$item->user->family ? ($item->user->name.' '.$item->user->family) : $item->user->username}}</td>
									<td>{{$item->status}}</td>
									<td>{{$item->value}}</td>
                                    <td>{{jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')}}</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
						{{ $requests->links('admin.components.pagination') }}
				@elseif($tab == 'wallet' && Auth::user()->hasRole('super_admin'))		
					<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>درگاه</th>
								<th>مبلغ(تومان)</th>
								<th>کد درگاه</th>
								<th>کاربر</th>
								<th>نام کاربری</th>
								<th>موبایل کاربر</th>
                                <th>تاریخ</th>
								 <th>توضیحات</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            @forelse($wallets as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>{{$item->payment_gateway}}</td>
									<td>{{ number_format($item->amount) }}</td>
									<td>{{$item->payment_ref}}</td>
									<td>{{$item->user->name.' '.$item->user->family}}</td>
									<td>{{$item->user->username}}</td>
									<td>{{$item->user->mobile}}</td>
                                    <td>{{jalaliDate($item->created_at, '%d %B %Y - %H:%M:%S')}}</td>
									<td>{{$item->status_message}}</td>
                                </tr>
                            @empty
                                <td class="text-center" colspan="7">
                                    دیتایی جهت نمایش وجود ندارد
                                </td>
                            @endforelse
                            <tr>
                            </tr>
                            </tbody>
                        </table>
                    </div>
						{{ $wallets->links('admin.components.pagination') }}
				@endif
                </div>
            </div>
        </div>
    </div>
</div>