<section id="main-cart" class="flex-box flex-justify-space">
    @if (Cart::isEmpty())
        <div class="xl:col-start-1 xl:col-end-13 2xl:col-end-13 xl:row-span-full overflow-hidden w-full">
            <div class="p-4 lg:p-6 bg-white rounded-2xl">
                <div class="grid gap-4 py-10 justify-center justify-items-center py-4">
                    <img class="w-60" src="{{ asset('site/svg/empty-cart.svg') }}" alt="">
                    <p class="font-bold text-2xl text-red">سبد خرید خالی است</p>
                </div>
            </div>
        </div>
    @else
        <section id="right-cart">
            <div class="show-header-cart-m flex-box">
                <div class="flex-box height-max">
                    <div id="cart-main" class="item-header-cart-m item-header-cart-m-active width-max flex-box">
                        <span>1. سبد خرید</span>
                    </div>

                    <div class="item-header-cart-m width-max flex-box">
                        <span>2. مشخصات سفارش</span>
                    </div>

                    <div class="item-header-cart-m width-max flex-box">
                        <span>3. جزئیات سفارش</span>
                    </div>
                </div>
            </div>

            <div class="show-header-cart flex-box">
                <div class="header-cart flex-box">
                    <div class="item-header-cart item-header-cart-active bac-color-blue flex-box">
                        <span>1. سبد خرید</span>

                        <svg width="10" height="19" viewBox="0 0 10 19" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.684858 8.80044C0.304292 9.18918 0.304292 9.81082 0.684858 10.1996L8.03542 17.7079C8.66225 18.3482 9.75 17.9044 9.75 17.0084L9.75 1.99165C9.75 1.09561 8.66225 0.651804 8.03542 1.29209L0.684858 8.80044Z"
                                fill="#3D42DF" />
                        </svg>
                    </div>

                    <div class="item-header-cart flex-box">
                        <span>2. مشخصات سفارش</span>
                    </div>

                    <div class="item-header-cart flex-box">
                        <span>3. جزئیات سفارش</span>
                    </div>
                </div>
            </div>

            @foreach (Cart::content() as $key => $item)
                <div class="item-cart">
                    <div class="header-item-cart flex-box flex-right">
                        <div class="right-header-item-cart flex-box">
                            <img src="{{ asset($item->image) }}" alt="">
                        </div>

                        <div class="left-header-item-cart">
                            <span>{{ $item->title }}</span>

                            <ul class="text-sm whitespace-nowrap">
                                @foreach ($item->form as $form)
                                    @if (($form['type'] ?? '') != 'paragraph')
                                        <p>{!! $form['label'] ?? '' !!}</p>
                                        <p class="font-medium">{{ $form['value'] ?? '' }}</p>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <button
                            class="text-red hover:text-opacity-70 focus:text-opacity-70 transition-colors duration-200"
                            wire:loading.attr="disabled" wire:click="delete({{ $key }})">
                            <i class="icon-cancel"></i>
                        </button>
                    </div>

                    <div class="flex-box flex-justify-space margin-top-3">
                        <div class="custom-input-number">
                            <button class="decrement">-</button>
                            <input type="number" type="number" min="1" max="100"
                                wire:model="quantities.{{ $key }}" class="input-number">
                            <button class="increment">+</button>
                        </div>

                        <div class="price-item-cart">
                            <span>{{ number_format($item->total()) }}</span>

                            <span>تومان</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <section id="left-cart">
            <div class="flex items-center gap-4 box-user-cart">
                @auth
                    <div class="w-12 h-12 relative mt-2">
                        <img class="w-16 h-16 absolute inset-0 top-auto" src="{{ asset('site/svg/avatar.svg') }}"
                            alt="avatar">
                    </div>
                    <p class="font-bold text-lg capitalize">{{ auth()->user()->username }}</p>
                @endauth

                @guest
                    <img class="rounded-xl w-14" src="{{ asset('site/images/guest-user.jpg') }}" alt="">
                    <a class="btn font-semibold h-14 w-full bg-gradient-to-l from-primary to-yellow text-white border-0 transition-colors
                        duration-200 hover:from-yellow hover:to-primary"
                        href="{{ route('auth') }}">ورود <span>/</span> عضویت</a>
                @endguest
            </div>

            <div class="box-price-cart margin-vetical-1">
                <div class="flex-box flex-justify-space">
                    <span>جمع جزء</span>

                    <div class="price-box-prices-cart">
                        <span>{{ number_format(Cart::price()) }}</span>

                        <span>تومان</span>
                    </div>
                </div>

                <div class="flex-box flex-justify-space margin-vetical-1">
                    <span>تخفیف</span>

                    <div class="price-box-prices-cart">
                        <span>{{ number_format(Cart::discount()) }}</span>

                        <span>تومان</span>
                    </div>
                </div>

                <div class="box-total-price flex-box flex-justify-space">
                    <span>جمع کل</span>

                    <div class="price-box-prices-cart">
                        <span>{{ number_format(Cart::total()) }}</span>

                        <span>تومان</span>
                    </div>
                </div>
            </div>

            <a href="{{ route('cart.payment') }}" wire:loading.attr="disabled">
                <button class="input-submit-style">ادامه جهت تسویه حساب</button>
            </a>
        </section>

        <section id="next-page-sticy" class="flex-box flex-justify-space">
            <a href="{{ route('cart.payment') }}" wire:loading.attr="disabled">
                <button class="input-submit-style">ادامه</button>
            </a>

            <div>
                <span>جمع کل</span>

                <div>
                    <b>{{ number_format(Cart::total()) }}</b>

                    <span>تومان</span>
                </div>
            </div>
        </section>
    @endif
</section>
