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

            <nav class="py-4" class="position-relative">
                <ul>
                    <div>
                        <li>
                            <a class="nav-menu-item">
                                <i class="nav-menu-item__icon icon-controler"></i>
                                <span class="nav-menu-item__title store-lable">فروشگاه</span>
                                <i class="fas fa-chevron-left" style="margin-right: 70px;"></i>
                            </a>

                        </li>
                        <div style="position: unset;" class="menu r_menu r_menu_height">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-12 col-12 bg-white px-0">
                                        <div class="base-category col-12 py-2">
                                            @foreach ($categories as $item)
                                                <div class="category">
                                                    <div class="d-flex align-items-center justify-content-start"
                                                        data-id="{{ $item['id'] }}">
                                                        <div class="px-2"><img src="{{ asset($item['icon']) }}"
                                                                alt=""></div>
                                                        <a href=""
                                                            class="d-none d-lg-block d-xl-block">{{ $item['title'] }}</a>
                                                        <a class="d-block d-lg-none d-xl-none position-relative"
                                                            style="z-index: -1;">{{ $item['title'] }}</a>
                                                    </div>
                                                    <div class="d-block d-lg-none d-xl-none">
                                                        <div class="sub-categories">
                                                            <div class="sub_category"
                                                                data-response-id="{{ $item['id'] }}">
                                                                <ul>
                                                                    <li>
                                                                        <div class="px-2">
                                                                            <a
                                                                                href="{{ route('index.categories', $item['slug']) }}">همه
                                                                                محصولات این دسته</a>
                                                                            <i
                                                                                class="fas fa-chevron-left text-secondary"></i>
                                                                        </div>
                                                                    </li>
                                                                    @foreach ($item['children_recursive'] as $item2)
                                                                        <li>
                                                                            <div class="px-2">
                                                                                <a
                                                                                    href="{{ route('index.categories', $item2['slug']) }}">{{ $item2['title'] }}</a>
                                                                                <i
                                                                                    class="fas fa-chevron-left text-secondary"></i>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div id="sub-categories"
                                        class="col-lg-7 d-none d-lg-block d-xl-block bg-white px-0">
                                        <div class="sub-categories">
                                            @foreach (array_column($categories, 'children_recursive') as $item)
                                                <div class="sub_category" id="{{ $item[0]['parent_id'] }}">
                                                    <ul>
                                                        @foreach ($item as $value)
                                                            <li>
                                                                <div class="px-2">
                                                                    <a
                                                                        href="{{ route('index.categories', $value['slug']) }}">{{ $value['title'] }}</a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu hidden_menu">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-sm-12 col-12 bg-white px-0">
                                    <div class="base-category col-12 py-2">
                                        @foreach ($categories as $item)
                                            <div class="category">
                                                <div class="d-flex align-items-center justify-content-start"
                                                    data-id="{{ $item['id'] }}">
                                                    <div class="px-2"><img src="{{ asset($item['icon']) }}"></div>
                                                    <a href="{{ route('index.categories', $item['slug']) }}"
                                                        class="d-none d-lg-block d-xl-block">{{ $item['title'] }}</a>
                                                    <a href="{{ route('index.categories', $item['slug']) }}"
                                                        class="d-block d-lg-none d-xl-none position-relative"
                                                        style="z-index: -1;">{{ $item['title'] }}</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div id="sub-categories" class="col-lg-7 d-none d-lg-block d-xl-block bg-white px-0">
                                    <div class="sub-categories">
                                        @foreach (array_column($categories, 'children_recursive') as $item)
                                            <div class="sub_category" id="c{{ $item[0]['parent_id'] }}">
                                                <ul>
                                                    @foreach ($item as $value)
                                                        <li>
                                                            <div class="px-2">
                                                                <a
                                                                    href="{{ route('index.categories', $value['slug']) }}">{{ $value['title'] }}</a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200 mb-4 mt-4">
                    <x-site.sidebar-link :active="request()->routeIs('home')" icon="icon-home" href="{{ route('home') }}">
                        خانه
                    </x-site.sidebar-link>

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
