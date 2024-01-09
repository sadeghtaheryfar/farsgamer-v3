<div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
							<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Page Heading-->
									<div class="d-flex align-items-baseline flex-wrap mr-5">
										<h5 class="text-dark font-weight-bold my-1 mr-5">داشبورد</h5>
									</div>
								</div>
	
							</div>
						</div>
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="row">
								<div class="col-xl-12">
                    <!--begin::Stats Widget 26-->
                    <div class="card card-custom bg-light-warning card-stretch gutter-b">
                        <!--begin::ody-->
                        <div class="card-body d-flex align-items-center">
							<span class="svg-icon svg-icon-4x svg-icon-warning ">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"></rect>
																		<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"></rect>
																		<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"></rect>
																		<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"></rect>
																	</g>
																</svg>
                                                    <!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-dark-75 px-4 font-size-h2 mb-0 d-block">
													سطح پنل همکاری :
												</span>
												<span class="font-weight-bold text-dark font-size-lg d-block">پایه</span>
												<button disabled class="btn btn-light-success font-weight-bolder ">ارتقا (به زودی)</button>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 26-->
									</div>
									<div class="col-xl-12">
										<div class="card card-custom gutter-b example example-compact">
											
												<form  style="padding:5px 10px 1px 10px" class="form">
														<div class="form-group">
														<label>فیلتر تاریخ</label>
														<div></div>
														<select class="form-control" wire:model="selectedDate">
															<option selected value="0">روزانه</option>
															<option value="1">دیروز</option>
															<option value="7">هفتگی</option>
															<option value="30">ماهیانه</option>
															<option value="90">3 ماهه</option>
															<option value="180">6 ماهه</option>
															<option value="365">سالیانه</option>
														</select>
													</div>
												</form>
												
											
										</div>
									</div>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{(count($allOrders))}}</span>
													<span class="font-weight-bold text-dark font-size-sm">تعداد سفارش های من</span>
												</div>
											</div>
										</div>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{(($onHoldOrders))}}</span>
													<span class="font-weight-bold text-dark font-size-sm">سفارشات در حال بررسی توسط پشتیبانی</span>
												</div>
											</div>
										</div>	
										<div class="col-xl-4">
											<div class="card card-custom bgi-no-repeat card-stretch gutter-b" style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-1.svg)">
												<!--begin::Body-->
												<div class="card-body">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>

													<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{(($refundedOrders))}}</span>
					<span class="font-weight-bold text-dark font-size-sm">شفارشات مسترد شده</span>
												</div>
											</div>
										</div>			
								</div>
							</div>				
						</div>
						
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="row">
									<div class="col-xl-12">
										<!--begin::Base Table Widget 2-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 pt-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">خرید های من</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-2 pb-0 mt-n3">
												<div class="tab-content mt-5" id="myTabTables2">
													
														<div class="table-responsive">
															<table class="table table-striped">
																<thead>
																<tr>
																	<th>#</th>
																	
																	<th>عنوان</th>
																	<th>تعداد</th>
																	
																</tr>
																</thead>
																<tbody>
															
																@forelse($most_sold_products as $item)
																	<tr>
																		<td>{{iteration($loop, $perPage)}}</td>
																		<td><a href="{{route('products.show', $item['title'] )}}">{{ auth()->user()->translate($item->title) }}</a></td>
																	
																		<td>{{ ($item->details_count) }}</td>
																			<td></td>
																	</tr>
																
																	@empty
																	<td class="text-center" colspan="8">
																	{{ auth()->user()->translate('دیتایی جهت نمایش وجود ندارد') }}
																		
																	</td>
                            										@endforelse
																</tbody>
															</table>
														</div>
													
												</div>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Base Table Widget 2-->
									</div>
								</div>
							</div>	
						</div>
						
	</div>
</div>