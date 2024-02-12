@if ($table === false)
    <section id="main-faqs" class="main-style-page flex-box flex-justify-space flex-aling-auto">
        <div class="right-faqs">
            <div class="message-right-faqs">
                <form id="form-faqs">
                    <div class="header-message-right-faqs">
                        <span>پیگیر سفارش</span>
                    </div>

                    <div>
                        <label for="number-order-faqs">کد سفارش :</label>

                        <input class="input-style input-hover" name="tracking-code" type="text" id="number-order-faqs"
                            placeholder="کد سفارش" wire:model="code" wire:keydown.enter="showOrder()">
                    </div>

                    <span id="errore-number-prudect-faqs" class="warning-form-faqs flex-box hide-item">
                        <img src="img/warning-2.svg" alt="">

                        <span>فیلد را کامل کنید</span>
                    </span>

                    <div>
                        <label for="number-phone-faqs">شماره همراه :</label>

                        <input dir="ltr" class="input-style input-hover" name="phone" type="text" id="number-phone-faqs"
                            wire:model="phoneNumber" wire:keydown.enter="showOrder()" placeholder="09*********">
                    </div>

                    <span id="errore-number-faqs" class="warning-form-faqs flex-box hide-item">
                        <img src="img/warning-2.svg" alt="">

                        <span>شماره همراه نادرست می باشد</span>
                    </span>

                    <br>

                    <div class="flex">
                        @if ($alert)
                            <i id="search-order-alert"></i>
                            <p class="text-danger-alert">{{ $alert }}</p>
                        @endif
                    </div>

                    <div>
                        <button id="form-faqs-btn" type="button" wire:click="showOrder"
                            class="input-submit-style">{{ $search }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="left-faqs">
            <div class="box-img-left-faqs">
                <div class="bac-left-faqs"></div>

                <img class="img0-left-faqs" src="{{ asset('site-v2/img/img-faqs/0.png') }}" alt="">

                <img class="img1-left-faqs" src="{{ asset('site-v2/img/img-faqs/1.png') }}" alt="">

                <img class="img2-left-faqs" src="{{ asset('site-v2/img/img-faqs/2.png') }}" alt="">

                <img class="img3-left-faqs" src="{{ asset('site-v2/img/img-faqs/3.png') }}" alt="">

                <div class="box-text-left-faqs flex-box flex-column flex-justify-space height-max">
                    <img class="img5-left-faqs" src="{{ asset('site-v2/img/img-faqs/5.png') }}" alt="">

                    <img class="img4-left-faqs" src="{{ asset('site-v2/img/img-faqs/4.png') }}" alt="">

                    <img class="img6-left-faqs" src="{{ asset('site-v2/img/img-faqs/6.png') }}" alt="">
                </div>
            </div>

            <div class="box-img-left-faqs-mobile">
                <div class="bac-left-faqs-mo flex-box">
                    <img class="img0-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/1m.png') }}"
                        alt="">
                    <img class="img1-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/2m.png') }}"
                        alt="">
                    <img class="img2-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/3m.png') }}"
                        alt="">
                    <img class="img3-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/4m.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>
@endif

@if ($table === true)
    <section id="main-faqs" class="main-style-page flex-box flex-justify-space flex-aling-auto">
        <div class="right-faqs-answer">
            <div class="box-faqs-answer">
                @if (count($userNotifications) > 0)
                    <div class="notif-header-faqs-answer flex-box">
                        <img src="img/sms-red.svg" alt="">

                        <div>
                            <span>شما</span>

                            <span class="color-red">{{ count($userNotifications) }} پیام جدید</span>

                            <span>از طرف فارس گیمر دارید </span>

                            <a href="{{ route('dashboard.notifications') }}" class="color-blue">وارد پنل</a>

                            <span>خود شوید</span>
                        </div>
                    </div>
                @endif

                <div class="header-faqs-answer flex-box">
                    <a href="#" onclick="location.reload()">
                        <img src="{{ asset('site-v2/img/arrow-right.svg') }}" alt="">
                    </a>

                    <span>زمان باقی مانده</span>
                </div>

                <div>
                    <div class="width-max">
                        <div class="number-time-detalist-pay flex-box color-blue">
                            <span id="time-time-detalist-pay"
                                data-countdown="{{ $singleOrder->delivery_time }}"></span>
                        </div>
                    </div>
                </div>

                <div class="date-faqs-answer">
                    <div class="item-detalist-user-pay flex-box flex-justify-space">
                        <span>کد سفارش : </span>

                        <span dir="ltr">FAG-{{ $code }}</span>
                    </div>

                    <div class="item-detalist-user-pay flex-box flex-justify-space">
                        <span>تاریخ :</span>

                        <span>{{ jalaliDate($singleOrder->created_at, '%d %B %Y') }}</span>
                    </div>
                </div>

                <div>
                    <div class="flex-box">
                        @foreach ($orders as $item)
                            <div class="item-more-img-detalist-product">
                                <img src="{{ asset($item->product->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="complete-faqs-answer">
                    <img src="{{ asset("site-v2/img/tik.svg") }}" alt="">

                    <span>{{ $item->status_label }}</span>
                </div>
            </div>
        </div>

        <div class="left-faqs">
            <div class="box-img-left-faqs">
                <div class="bac-left-faqs"></div>

                <img class="img0-left-faqs" src="{{ asset('site-v2/img/img-faqs/0.png') }}" alt="">

                <img class="img1-left-faqs" src="{{ asset('site-v2/img/img-faqs/1.png') }}" alt="">

                <img class="img2-left-faqs" src="{{ asset('site-v2/img/img-faqs/2.png') }}" alt="">

                <img class="img3-left-faqs" src="{{ asset('site-v2/img/img-faqs/3.png') }}" alt="">

                <div class="box-text-left-faqs flex-box flex-column flex-justify-space height-max">
                    <img class="img5-left-faqs" src="{{ asset('site-v2/img/img-faqs/5.png') }}" alt="">

                    <img class="img4-left-faqs" src="{{ asset('site-v2/img/img-faqs/4.png') }}" alt="">

                    <img class="img6-left-faqs" src="{{ asset('site-v2/img/img-faqs/6.png') }}" alt="">
                </div>
            </div>

            <div class="box-img-left-faqs-mobile">
                <div class="bac-left-faqs-mo flex-box">
                    <img class="img0-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/1m.png') }}"
                        alt="">
                    <img class="img1-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/2m.png') }}"
                        alt="">
                    <img class="img2-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/3m.png') }}"
                        alt="">
                    <img class="img3-left-faqs-mo" src="{{ asset('site-v2/img/img-faqs-mobile/4m.png') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section>
@endif

@if ($table === true)
    <div class="relative grid gap-4 overflow-hidden bg-white rounded-2xl xl:grid-cols-12 xl:gap-8 xl:bg-transparent">
        <div
            class="xl:col-start-1 xl:col-end-9 2xl:col-end-10 xl:row-span-full overflow-hidden xl:bg-white xl:rounded-2xl">
            <div class="p-4 lg:p-6 bg-white rounded-2xl">
                <h1 class="font-semibold text-lg mb-4">پیگیری سفارش</h1>
                <ol class="grid gap-4">
                    @foreach ($orders as $item)
                        <li class="odd:bg-gray-50 p-4 rounded-2xl border border-gray-100 font-medium">
                            <a class="flex gap-4 items-center">
                                <img class="rounded-xl w-24" src="{{ asset($item->product->image) }}">
                                <h3>{{ $item->product->title }}</h3>
                            </a>
                            <p class="mt-4 text-sm text-red-400">{{ $item->status_label }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>

        <div
            class="border-t border-gray-200 pt-4 xl:border-none xl:pt-0 xl:col-start-9 xl:col-end-13 2xl:col-start-10 xl:row-span-full xl:bg-white xl:rounded-2xl">
            <div class="p-4 rounded-2xl lg:p-6 bg-white">

                <div class="bg-gray-50 text-primary border border-primary rounded-2xl text-center" wire:ignore>
                    <p class="px-3 py-2">زمان تحویل</p>
                    <p class="px-3 py-2 font-medium border-t border-primary text-2xl"
                        data-countdown="{{ $singleOrder->delivery_time }}"></p>
                </div>

                <ul class="my-6 space-y-2 text-base">
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">شماره سفارش</p>
                        <p class="dir-ltr font-semibold"><span class="text-gray2-700"></span><span
                                class="font-isans-ed select-all">FAG-{{ $code }}</span></p>
                    </li>
                    <li class="flex items-center justify-between">
                        <p class="text-gray-500 font-semibold">تاریخ</p>
                        <p class="font-semibold">{{ jalaliDate($singleOrder->created_at, '%d %B %Y') }}</p>

                    </li>
                </ul>
                @if (count($userNotifications) > 0)
                    <p class="text-red text-sm text-center">شما {{ count($userNotifications) }} پیام از پشتیبانی دارید
                    </p>
                    <a href="{{ route('dashboard.notifications') }}"
                        class="btn btn-primary w-full h-12.5 mt-2 text-lg font-semibold">مشاهده پیام</a>
                @endif
            </div>
        </div>
    </div>
@endif



@push('scripts')
    <script>
        window.livewire.on('showOrder', () => {
            $('[data-countdown]').each(function() {
                var $this = $(this),
                    finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function(event) {
                    $this.html(event.strftime('%H:%M:%S'));
                });
            });
        });
    </script>
@endpush
