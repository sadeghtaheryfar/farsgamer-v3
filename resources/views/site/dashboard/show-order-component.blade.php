<div class="grid gap-4 xl:grid-cols-12 xl:items-start xl:gap-8">

    {{--Modal--}}
    <div class="modal fade" id="orderNotCompleted" tabindex="-1" aria-labelledby="orderNotCompletedLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-right p-6 leading-5">
                    دوست عزیز، عذر خواهی ما را بابت انجام نشدن سفارشتان در زمان مقرر بپذیرید. هم اکنون یکی از همکاران ما دلیل انجام نشدن سفارش شما را پیگیری و به شما اطلاع رسانی خواهند کرد. خواهشمندیم تا زمان اطلاع همکارانم منتظر بمانید و از تماس با پشتیبانی در این مورد بپرهیزید. با تشکر از اعتماد و انتخاب شما  - فروشگاه فارس گیمر -
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">متوجه شدم</button>
                </div>
            </div>
        </div>
    </div>

    <div class="xl:col-start-1 xl:col-end-9 2xl:col-end-10 xl:row-span-full overflow-hidden">
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            <h1 class="font-semibold text-lg mb-4">جزئیات سفارش</h1>
            <div class="table-wrapper">
                <table>
                    <thead class="mb-4 text-sm">
                    <tr class="text-gray-500">
                        <th>محصول</th>
                        <th></th>
                        <th>تعداد</th>
                        <th>جمع جزء</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($order->details as $item)
						@if(!empty($item->product) )
                        <tr class="h-2 last:h-0"></tr>
						@if($item->product->type == \App\Models\Product::TYPE_TICKET)
						<tr class="order-details__item border-0">
							<td class="bg-gray-50 rounded-r-2xl w-28 h-28">
                                <img class="rounded-xl min-w-28 min-h-28" src="{{asset($item->product->image)}}" alt="">
                            </td>
							<td class="bg-gray-50">
								<h3 class="font-semibold mb-2 text-sm min-w-24">
									<button class="btn px-8 btn-primary btn-xs btn-outline"wire:click="download()">
										افزودن به استوری
                                    </button>
								</h3>
							</td>
							<td class="bg-gray-50">
                                <div class="bg-white rounded-2xl w-16 h-10 flex items-center justify-center">{{$item['quantity']}}</div>
                            </td>
							<td class="bg-gray-50">
                                <div class="flex items-center gap-1 whitespace-nowrap">
                                    <p class="text-lg font-semibold">{{number_format($item['price'])}}</p>
                                    <p class="text-sm">تومان</p>
                                </div>
                            </td>
						</tr>
						@else
                        <tr class="order-details__item border-0">
                            <td class="bg-gray-50 rounded-r-2xl w-28 h-28">
                                <img class="rounded-xl min-w-28 min-h-28" src="{{asset($item->product->image ?? '')}}" alt="">
                            </td>
                            <td class="bg-gray-50">
                                <h3 class="font-semibold mb-2 text-sm min-w-24">
                                    {{$item->product->title}} <br>
                                    {{$item->status_label}} <br>
                                    @if(\Illuminate\Support\Carbon::make($order->created_at)
                                        ->addHours($item->product->delivery_time)
                                        ->isPast() &&
                                         $item->product->type != \App\Models\Product::TYPE_PHYSICAL &&
                                         $item->status == \App\Models\Order::STATUS_PROCESSING)
                                        <button class="btn px-8 btn-primary btn-xs btn-outline" data-bs-toggle="modal" data-bs-target="#orderNotCompleted"
                                                wire:click="orderNotCompleted({{$item->id}})">سفارش انجام نشده؟
                                        </button>
                                    @elseif($item->product->type != \App\Models\Product::TYPE_PHYSICAL &&
                                        $item->status == \App\Models\Order::STATUS_PROCESSING)
                                        <p data-countdown="{{\Illuminate\Support\Carbon::make($order->created_at)->addHours($item->product->delivery_time)}}"></p>
                                    @endif
                                </h3>
                                <ul class="order-details__item__extra-content text-sm whitespace-nowrap">
                                    @foreach($item['form'] as $form)
                                        @if(($form['type'] ?? '') != 'paragraph')
                                            <p>{!! $form['label'] ?? '' !!}</p>
                                            <p class="font-medium">{{$form['value'] ?? ''}}</p>
{{--                                            <li class="flex">--}}
{{--                                                <span>{!! $form['label'] !!}</span>--}}
{{--                                                <span class="font-medium">{{$form['value']}}</span>--}}
{{--                                            </li>--}}
                                        @endif
                                    @endforeach

                                    @if($item['licenses'] != '')
                                        @foreach($item['licenses'] as $license)
                                            <li class="flex">
                                                <span>کد: </span>
                                                <span class="font-medium">{{$license}}</span>
                                            </li>
                                        @endforeach
									
                                    @endif
                                </ul>
                            </td>
                            <td class="bg-gray-50">
                                <div class="bg-white rounded-2xl w-16 h-10 flex items-center justify-center">{{$item['quantity']}}</div>
                            </td>
                            <td class="bg-gray-50">
                                <div class="flex items-center gap-1 whitespace-nowrap">
                                    <p class="text-lg font-semibold">{{number_format($item['price'])}}</p>
                                    <p class="text-sm">تومان</p>
                                </div>
                            </td>
                            <td class="bg-gray-50 rounded-l-2xl">
                                <button class="order-details__item__toggle-content bg-primary hover:bg-opacity-100 bg-opacity-10 w-8 h-8
                                 flex items-center justify-center group rounded-xl transition-colors duration-150 ease-in">
                                    <i class="icon-angle-down text-primary group-hover:text-white"></i>
                                </button>
                            </td>
                        </tr>
						@endif	
						@endif	
                    @endforeach
                    </tbody>
                </table>
            </div>

            <hr class="border-gray-200 my-4">

            <ul class="space-y-2 text-sm">
                    <li class="flex items-center justify-between">
                        <p class="font-semibold">جمع کل سبد خرید</p>
                        <div class="flex items-center gap-1 whitespace-nowrap">
                            <p class="font-semibold">{{number_format($order->price)}}</p>
                            <p class="text-sm">تومان</p>
                        </div>
                    </li>
                    @if($order->discount)
                        <li class="flex items-center justify-between">
                            <p class="font-semibold">تخفیف</p>
                            <div class="flex items-center gap-1 whitespace-nowrap">
                                <p class="font-semibold">{{number_format($order->discount)}}</p>
                                <p class="text-sm">تومان</p>
                            </div>
                        </li>
                    @endif
                    @if($order->voucher_amount)
                        <li class="flex items-center justify-between">
                            <p class="font-semibold">کد تخفیف</p>
                            <div class="flex items-center gap-1 whitespace-nowrap">
                                <p class="font-semibold">{{number_format($order->discount_code)}}</p>
                                <p class="text-sm">تومان</p>
                            </div>
                        </li>
                    @endif
                    @if($order->wallet_pay)
                        <li class="flex items-center justify-between">
                            <p class="font-semibold">کیف پول</p>
                            <div class="flex items-center gap-1 whitespace-nowrap">
                                <p class="font-semibold">{{number_format($order->wallet_pay)}}</p>
                                <p class="text-sm">تومان</p>
                            </div>
                        </li>
                    @endif
                    <li class="flex items-center justify-between">
                        <p class="font-semibold text-lg text-red">قیمت نهایی</p>
                        <div class="flex items-center gap-1 whitespace-nowrap text-lg text-red">
                            <p class="text-lg font-semibold">{{number_format($order->total_price)}}</p>
                            <p class="text-sm">تومان</p>
                        </div>
                    </li>
            </ul>
        </div>
    </div>

    <div class="xl:col-start-9 xl:col-end-13 2xl:col-start-10 xl:row-span-full">
        <a class="p-4 lg:p-6 bg-white rounded-2xl flex items-center justify-center gap-2 mb-4 link-transition hover:text-primary-deep"
           href="{{route('home')}}">
            <i class="icon-arrow-right-square"></i>
            <p>بازگشت به خانه</p>
        </a>
        <div class="p-4 lg:p-6 bg-white rounded-2xl">
            @if($order->status == \App\Models\Order::STATUS_PROCESSING)
            <div class="bg-gray-50 text-primary border border-primary rounded-2xl text-center" wire:ignore>
                <p class="px-3 py-2">زمان تحویل</p>
                <p class="px-3 py-2 font-medium border-t border-primary text-2xl" data-countdown="{{$order->delivery_time}}"></p>
            </div>
            @endif

            <ul class="mt-4 space-y-2 text-base">
                @if($order)
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">شماره سفارش</p>
                        <p class="dir-ltr font-semibold">
                            <span class="text-gray2-700">#</span><span class="font-isans-ed select-all">{{$order->tracking_code}}</span>
                        </p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">تاریخ</p>
                        <p class="font-semibold">{{jalaliDate($order->created_at, '%d %B %Y')}}</p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">نام</p>
                        <p class="font-semibold">{{$order->full_name}}</p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">موبایل</p>
                        <p class="font-semibold">{{$order->mobile}}</p>
                    </li>
                    <li class="flex flex-wrap items-center justify-between">
                        <p class="text-gray-500 font-semibold">ایمیل</p>
                        <p class="font-semibold break-words">{{$order->email}}</p>
                    </li>
                    @if($order->description)
                        <li class="flex items-center justify-between">
                            <p class="text-gray-500 font-semibold">توضیحات</p>
                            <p class="font-semibold">{{$order->description}}</p>
                        </li>
                    @endif
                @endif
            </ul>

            <hr class="border-gray-200 my-4">

            <div class="mt-4">
                <p class="mb-2 font-semibold">کدهای خریداری شده</p>
                <ul class="grid gap-2 text-sm text-white text-opacity-95 font-semibold">
                    @foreach($order->details as $item)
                        @if($item['licenses'] != '')
                            @foreach($item['licenses'] as $license)
                                <li class="flex items-center gap-2 justify-between p-3 bg-primary rounded-2xl text-white">
                                    <p class="font-isans-ed mx-auto select-all">{{$license}}</p>
                                </li>
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%H:%M:%S'));
            });
        });
    </script>
@endpush