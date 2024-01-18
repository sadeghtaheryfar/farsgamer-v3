<header>
    <section id="box-header">
        <section id="right-header">
            <form class="hidden lg:block relative w-64">
                <div id="box-search-header">
                    <label for="q" wire:click="updateSearch()">
                        <img src="{{ asset("site-v2/img/search.svg") }}" id="icon-search-header" alt="">
                    </label>

                    <input class="input-search-header" id="q" type="search"
                        placeholder="جستجو در محصولات فارس گیمر" wire:keydown.enter="updateSearch()"
                        wire:model.lazy="q">
                </div>
            </form>
        </section>

        <section id="left-header">
            <div id="box-icon-notif">
                <div id="icon-notif" class="nav-right-icon open-menu">
                    <img src="{{ asset("site-v2/img/notification.svg") }}" alt="">

                    @if (count($userNotifications) + count($notifications) > 0)
                        <span
                            class="number-notif-cart open-menu">{{ count($userNotifications) + count($notifications) }}</span>
                    @endif
                </div>

                <div id="box-show-notif" class="hide-item over-menu">
                    <div id="box-notif">
                        <div id="header-box-notif">
                            <span>اعلانات</span>

                            <img class="clothe-menu icon-exit-notif" src="{{ asset("site-v2/img/add.svg") }}" alt="">
                        </div>

                        <div class="message-box-notif">
                            <div class="header-message-notif">
                                <div class="item-personal-notif">
                                    <span id="header-one-notif" class="item-notif item-notif-active personal">پیام های
                                        عمومی<span style="color: red;">({{ count($notifications) }})</span></span>
                                </div>

                                @auth
                                    <div class="item-general-notif">
                                        <span id="header-two-notif" class="item-notif general"> پیام های
                                            شخصی <span style="color: red;">({{ count($userNotifications) }})</span></span>
                                    </div>
                                @endauth
                            </div>

                            <div id="message-notif-personal">
                                @foreach ($notifications as $item)
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif">{{ jalaliDate($item->created_at, 'diffForHumans') }}</span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span>{{ $item->message }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="message-notif-general" class="hide-item">
                                @foreach ($notifications as $item)
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif">{{ jalaliDate($item->created_at, 'diffForHumans') }}</span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span>{{ $item->message }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div id="box3-notif">
                            <a href="dash-notifications.html"><span>دیدن همه اعلانات</span></a>
                        </div>
                    </div>
                </div>

                <div id="box-notif-clothe" class="exit-menu hide-item"></div>
            </div>

            <a href="{{ route('cart') }}">
                <div class="nav-right-icon cart-icon">
                    <img src="{{ asset("site-v2/img/shopping-cart.svg") }}" alt="">

                    @if ($basketCount > 0)
                        <span class="number-notif-cart">{{ $basketCount }}</span>
                    @endif
                </div>
            </a>

            @auth
                <a href="{{ route('dashboard') }}">
                    <div class="nav-right-icon login-icon">
                        <img src="{{ asset("site-v2/img/user.svg") }}" alt="">
                        <span class="text-nav">{{ Auth::user()->name }}</span>
                    </div>
                </a>
            @endauth

            @guest
                <a href="{{ route('auth') }}">
                    <div class="nav-right-icon login-icon">
                        <img src="{{ asset("site-v2/img/user.svg") }}" alt="">
                        <span class="text-nav">ورود / ثبت نام</span>
                    </div>
                </a>
            @endguest
        </section>
    </section>

    <div id="box-header-mobile-asli">
        <section id="box-header-mobile">
            <section id="right-header">
                <img id="nave-menu-item-icon" class="open-menu-mobile" src="{{ asset("site-v2/img/menu.svg") }}" alt="">
            </section>

            <section id="center-header">
                <a href="{{ route("home") }}"><img id="logo-mobile" src="{{ asset("site-v2/img/logo-farsgamer.png") }}" alt="لوگو"></a>
            </section>

            <section id="left-header">
                <div class="nav-right-icon-mobile clothe-menu-mobile">
                    <img src="{{ asset("site-v2/img/notification.svg") }}" alt="">

                    @if (count($userNotifications) + count($notifications) > 0)
                        <span
                            class="number-notif-cart-mobile">{{ count($userNotifications) + count($notifications) }}</span>
                    @endif
                </div>

                <div id="notif-mobile">
                    <div id="box-notif-mobile" class="hide-item">
                        <div id="header-box-notif">
                            <span>اعلانات</span>

                            <img class="icon-exit-notif clothe-menu-mobile" src="{{ asset("site-v2/img/add.svg") }}" alt="">
                        </div>

                        <div class="message-box-notif">
                            <div class="header-message-notif">
                                <div class="item-personal-notif personal-mobile">
                                    <span id="header-three-notif" class="item-notif item-notif-active">پیام های عمومی
                                        <span style="color: red;">({{ count($notifications) }})</span>
                                    </span>
                                </div>

                                @auth
                                    <div class="item-general-notif general-mobile">
                                        <span id="header-four-notif" class="item-notif"> پیام های شخصی
                                            <span style="color: red;"> ({{ count($userNotifications) }}) </span></span>
                                    </div>
                                @endauth
                            </div>

                            <div id="message-notif-general-mobile" class="hide-item">
                                @foreach ($notifications as $item)
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif">{{ jalaliDate($item->created_at, 'diffForHumans') }}</span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span>{{ $item->message }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="message-notif-personal-mobile">
                                @foreach ($notifications as $item)
                                    <div class="box-asli-notif">
                                        <div class="box-header-notif">
                                            <span
                                                class="item-clock-box-notif">{{ jalaliDate($item->created_at, 'diffForHumans') }}</span>

                                            <span class="item-date-box-notif" dir="ltr">پشتیبانی</span>
                                        </div>

                                        <div class="box-message-notif">
                                            <span>{{ $item->message }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @auth
                            <div id="box3-notif">
                                <a href="dash-notifications.html"><span>دیدن همه اعلانات</span></a>
                            </div>
                        @endauth
                    </div>
                </div>
            </section>
        </section>

        <section id="box2-header-mobile">
            <section id="right-header-mobile">
                <form class="lg:block relative">
                    <div id="box-search-header-mobile">
                        <label for="q" wire:click="updateSearch()">
                            <img src="{{ asset("site-v2/img/search.svg") }}" id="icon-search-header" alt="">
                        </label>

                        <input class="input-search-header-mobile" id="q" type="search"
                            placeholder="جستجو در محصولات" wire:model.lazy="q" wire:keydown.enter="updateSearch()">
                    </div>
                </form>
            </section>

            <section id="left-header">
                @auth
                    <a href="{{ route('dashboard') }}">
                    <div class="nav-two-left-icon-mobile">
                        <img src="{{ asset("site-v2/img/user.svg") }}" alt="">
                        <span class="text-nav">{{ Auth::user()->name }}</span>
                    </div>
                    </a>
                @endauth

                @guest
                    <a href="{{ route('auth') }}">
                        <div class="nav-two-left-icon-mobile">
                            <img src="{{ asset("site-v2/img/user.svg") }}" alt="">
                            <span class="text-nav">ورود</span>
                        </div>
                    </a>
                @endguest

                <a href="{{ route('cart') }}" class="nav-left-icon-mobile">
                    <div>
                        <img src="{{ asset("site-v2/img/shopping-cart.svg") }}" alt="">

                        @if ($basketCount > 0)
                            <span class="number-notif-cart">{{ $basketCount }}</span>
                        @endif
                    </div>
                </a>
            </section>
        </section>
    </div>
</header>