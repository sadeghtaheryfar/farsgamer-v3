<div>
    <x-admin.subheader title="محصولات" :mode="$mode" :create="false"/>

    <div class="content d-flex flex-column-fluid" >
        <div class="container">
            <div class="card">
                <div class="card-body">
				<div class="form-group col-12">
                        <label for="category">دسته بندی</label>
                        <select id="category" class="form-control" wire:model="category">
                            <option value="" selected>انتخاب کنید...</option>
                            @foreach($mainCategories as $category)
                                <option value="{{$category->slug}}" class="h5">{{$category->title}}</option>
                                @foreach($category->subCategories as $subCategory)
                                    <option value="{{$subCategory->slug}}">{{$subCategory->title}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @isset($help)
                            <small class="text-muted">{{$help}}</small>
                        @endisset
                    </div>
					 @include('admin.components.advanced-table')
                    <br>
					@foreach($categories as $key => $item)
						<fieldset class="border my-4">
							<legend class="float-none w-auto mr-3"><strong>{{$key}}:</strong></legend>
							<div class="row p-3">
							
							@foreach($item as $value)
								<div class="col-12 col-md-3 rounded-3">
									<div class="card card-custom gutter-b shadow rounded-2">
										<div class="card-header ">
											<div class="card-title m-auto w-100 text-center">
												<h3 class="card-label m-auto">
													{{ $value->title}}
													
												</h3>
											
											</div>
											<strong class="d-block m-auto w-100 text-center">قیمت : {{ number_format($value->partner_price) }} تومان</strong>
										</div>
										<div class="card-body text-center">
											<a href="{{route('partner.store.new.orders',$value->id)}}" class="btn btn-outline-secondary"><i class="icon-basket"></i> خرید محصول</a>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</fieldset>
					@endforeach
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>