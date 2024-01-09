<div>
     <div id="kt_subheader" class="subheader py-2 py-lg-6 subheader-solid">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-1">
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <h5 class="text-dark font-weight-bold my-1 mr-5">لایسنس ها</h5>
                
            </div>
        </div>
    </div>
</div>

    <div class="content d-flex flex-column-fluid">
        <div class="container">

            <div class="card">
                <div class="card-body">
                   
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>دسته بندی</th>
								
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $key => $item)
                                <tr>
                                    <td>{{iteration($loop, $perPage)}}</td>
                                    <td>
										
										<h2 class="text-info">{{ $key }}</h2>
										
									</td>
									<td>
										<tr>
											<th>#</th>
											<th>محصول</th>
											<th>تعداد</th>
										</tr>
										@foreach($item as $value)
										<tr>
											<td>{{iteration($loop, $perPage)}}</td>
											<td>{{ $value->title }}</td>
											<td class="{{ ($codes[$value->id] ?? 0) == 0 ? 'text-danger' : '' }}">{{ $codes[$value->id] ?? 0 }}</td>
										</tr>
										@endforeach
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
                   
                </div>
            </div>
        </div>
    </div>
</div>
