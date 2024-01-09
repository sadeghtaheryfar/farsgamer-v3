<div class="container py-10 2md:grid 2md:grid-cols-12 2md:gap-4 2md:items-start xl:gap-8 2xl:gap-12">
    <livewire:site.dashboard.sidebar/>

    <div class="p-4 rounded-2xl bg-white 2md:col-start-5 2md:col-end-13 xl:col-start-4 h-full">
        @if($verifiedTransaction)
            @if($isSuccessful)
                <p class="bg-light-green px-4 py-2 text-center rounded-2xl mb-4 font-medium">{{$message}}</p>
            @else
                <p class="bg-pink px-4 py-2 text-center rounded-2xl mb-4 font-medium">{{$message}}</p>
            @endif
        @endif
        <div class="p-4 bg-gray-50 rounded-2xl">
            <div class="grid grid-cols-2 gap-4 border-b border-gray-200 pb-4 mb-4 xl:flex xl:justify-between xl:items-center xl:border-0">

                <div class="flex items-center gap-2">
                    <i class="icon-wallet text-xl text-gray-900 w-10 h-10 flex items-center justify-center rounded-xl bg-yellow"></i>
                    <h1>موجودی کیف پول:</h1>
                </div>
                <p class="flex items-center gap-1 justify-end text-primary">
                    <span class="text-lg font-bold tracking-tighter">{{number_format(auth()->user()->balance)}}</span>
                    <span class="text-sm">تومان</span>
                </p>

                <form class="col-span-full w-full xl:max-w-88" wire:submit.prevent="chargeWallet()">
                    <div class="relative">
                        <input class="text-field text-sm w-full" type="number" min="0" placeholder="مبلغ به تومان" wire:model.defer="amount">
                        <button type="submit" class="btn btn-primary absolute top-0 bottom-0 left-0 text-sm">شارژ کیف پول</button>
                    </div>
                    @error('amount')
                     <small class="text-red"> {{$message}}</small> 
					 
                    @enderror
                </form>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead class="text-sm text-gray-500">
                    <tr>
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
                                <div class="comment__date">
                                    <span class="comment__date-day">{{jalaliDate($item->created_at, '%d')}}</span>
                                    <span class="comment__date-month">{{jalaliDate($item->created_at, '%B')}}</span>
                                </div>
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
        </div>
    </div>
</div>
