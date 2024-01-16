<sidebar id="sidebar">
    <div id="sidebar__content">
        <a id="sidebar__logo"
            class="hidden px-6 pr-8 h-16 items-center lg:h-20 lg:absolute lg:-top-20 lg:right-0 lg:left-0 lg:bg-white"
            href="/">
            <div class="flex">
                <img class="lg:w-34" src="{{ asset('site/images/logo.png') }}" alt="لوگو">
            </div>
        </a>
        <div id="sidebar__scrollable-content" class="overflow-y-auto max-h-full px-4 pb-6">

            <form class="flex mt-4 lg:hidden relative w-full">
                <input id="search-two" class="text-field h-12 pr-10 pl-2 text-sm w-full" type="text"
                    placeholder="جستجو در محصولات فارس گیمر" wire:keydown.enter="updateSearch()"
                    wire:model.lazy="search">
                <label class="absolute h-full top-0 right-2 bottom-0 flex items-center justify-center mb-0 cursor-text"
                    for="search-two" wire:click="updateSearch()">
                    <i class="icon-search w-8 flex items-center justify-center text-gray2-700"></i>
                </label>
            </form>

            <nav class="py-4">
                <ul>
                    <li>
                        <a class="nav-menu-item" href="https://www.farsgamer.com/shop">
                            <i class="nav-menu-item__icon icon-controler"></i>
                            <span class="nav-menu-item__title store-lable">فروشگاه</span>
                            <i class="fas fa-chevron-left" style="margin-right: 70px;"></i>
                        </a>

                    </li>
                    <hr class="border-gray-200 mb-4 mt-4">
                    <x-site.sidebar-link :active="request()->routeIs('home')" icon="icon-home" href="{{ route('home') }}">
                        خانه
                    </x-site.sidebar-link>
                    {{-- @if ($start_lottery)
                        <li>
                            <a class="nav-menu-item {{ request()->routeIs('lottery') ? 'nav-menu-item--active' : '' }}"
                                href="{{ route('lottery') }}">
                                <i class="fa fa-gift mr-1 fa-lg"></i>
                                <span class="nav-menu-item__title store-lable">قرعه کشی</span>
                            </a>
                        </li>
                    @endif --}}
                    <x-site.sidebar-link :active="request()->routeIs('faqs')" icon="icon-search" href="{{ route('faqs') }}">
                        پیگیری سفارش
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('faq')" icon="icon-question-answer" href="{{ route('faq') }}">
                        سوالات متداول
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('rules')" icon="icon-law" href="{{ route('rules') }}">
                        قوانین
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('contact-us')" icon="icon-mail" href="{{ route('contact-us') }}">
                        ارتباط با ما
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('why-us')" icon="icon-fortnite" href="{{ route('why-us') }}">
                        چرا فارس گیمر
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs(['articles', 'articles.show'])" icon="icon-articles" href="{{ route('articles') }}">
                        مقالات
                    </x-site.sidebar-link>
                </ul>
            </nav>

            <hr class="border-gray-200 mb-4">

            <div>

                <ul class="grid gap-2 order-details">

                    <li>
                        <i class="last-orders"></i>
                        <p>
                            <b>{{ $ordersLasts }}</b>
                            <small>سفارش تکمیل شده 24 ساعت اخیر</small>
                        <p>
                    </li>
                    <li>
                        <i class="online-orders"></i>
                        <p>
                            <b>{{ $ordersOnlines }}</b>
                            <small>سفارش در حال انجام</small>
                        <p>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</sidebar>
