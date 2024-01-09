<div>
	<x-admin.subheader title="کیف پول" :mode="$mode" :create="false"/>
    <div class="content d-flex flex-column-fluid" >
        <div class="container">
			<x-admin.forms.form title="کیف پول" >
				@if($verifiedTransaction)
						@if($isSuccessful)
							<p class="bg-light-green px-4 py-2 text-center rounded-2xl mb-4 font-medium">{{$message}}</p>
						@else
							<p class="bg-pink px-4 py-2 text-center rounded-2xl mb-4 font-medium">{{$message}}</p>
						@endif
					@endif
					<div class="col-12">

							<div class="d-flex align-items-center pb-4">
								
								<h1>موجودی کیف پول  : </h1>
								<span > {{number_format(auth()->user()->balance)}} </span>
								<span class="text-sm">تومان</span>
							</div>
						

							<form class="form-group" wire:submit.prevent="chargeWallet()">
								<div class="d-flex align-items-center">
									<input class="form-control" type="number" min="0" placeholder="مبلغ به تومان" wire:model.defer="amount">
									<button type="submit" class="btn btn-primary rounded-0">شارژ کیف پول</button>
								</div>
								@error('amount')
								<small class="text-red"> {{$message}}</small> 
								
								@enderror
							</form>
						</div>

						<div class="table-responsive">
							<table class="table table-striped">
								<thead class="text-sm text-gray-500">
								<tr>
									<th>#</th>
									<th>تاریخ</th>
									<th>مبلغ</th>
									<th>نوع تراکنش</th>
									<th>جزئیات</th>
								</tr>
								</thead>
								<tbody class="text-black">
								@foreach($transactions as $item)
									<tr>
										<td>
											{{ $loop->iteration }}
										</td>
										<td>
											{{jalaliDate($item->created_at, '%Y/%m/%d')}}
										</td>
										<td class="whitespace-nowrap">
											<span class="flex items-center gap-1"><span class="font-semibold">{{number_format($item->amount)}}</span><span
														class="text-sm">تومان</span></span>
										</td>
										<td>{{$item->type == 'withdraw' ? 'برداشت' : 'واریز'}}</td>
										<td class="min-w-32">{{$item->meta['description']}}</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
			</x-admin.forms.form>
		
		</div>
    </div>
</div>
