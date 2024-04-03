<header id="header" style="margin-right:0rem"  wire:ignore.self >
    <div class="container-base flex items-center gap-4">
	 	<a id="sidebar__logo"  href="/" class="header_logos">
            <div class="flex">
                <img class="lg:w-34" src="{{asset('site/images/logo.png')}}" alt="لوگو">
            </div>
        </a>
        <div class="flex items-center gap-4 lg:gap-8">
            <button id="burger">
                <div></div>
                <div></div>
            </button>
            <a href="{{route('home')}}" id="header__logo" class="h-16 flex items-center lg:h-20">
                <img src="{{asset('site/images/logo.png')}}" class="w-24 2xs:w-28 lg:w-32" alt="لوگو">
            </a>
            <form class="hidden lg:block relative w-64">
                <input id="q" class="text-field h-12 pr-10 text-sm w-76" type="text" placeholder="جستجو در محصولات فارس گیمر" wire:keydown.enter="updateSearch()" wire:model.lazy="q">
                <label class="absolute h-full top-0 right-2 bottom-0 flex items-center justify-center mb-0 cursor-text" for="q" wire:click="updateSearch()">
                    <i class="icon-search w-8 flex items-center justify-center text-gray2-700"></i>
                </label>
            </form>
        </div>
        <div class="flex items-center gap-4" style="margin-right: auto;">

            <div class="announcements">
                <a class="header-widget announcements__toggle-btn">
                    <i class="icon-bell header-widget__icon"></i>
                    @if(count($userNotifications) + count($notifications) > 0)
                        <div class="header-widget__bobble">{{count($userNotifications) + count($notifications)}}</div>
                    @endif
                </a>
                <div easytab class="announcements__menu hidden" wire:ignore.self x-data="{activeTab: 1}">
                    <div class="announcements__menu-head">
                        <ul class="flex pt-2">
                            <li easytab-tab @click="activeTab = 1" x-bind:class="{ 'active': activeTab == 1 }">اطلاعیه عمومی ({{count($notifications)}})</li>
                            @auth
                                <li easytab-tab @click="activeTab = 2" x-bind:class="{ 'active': activeTab == 2 }" wire:click="readNotifications()">اطلاعیه شما ({{count($userNotifications)}})</li>
                            @endauth
                        </ul>
                        <button class="announcements__close-btn">
                            <i class="icon-cancel"></i>
                        </button>
                    </div>
                    <div class="py-2">
                        <div easytab-content x-bind:class="{ 'active': activeTab == 1 }">
                            <ul>
                                @foreach($notifications as $item)
                                    <li>
                                        <div class="group flex items-start gap-2 py-3 px-2 border-r-3 border-transparent bg-white transition duration-200 ease-in-out hover:bg-gray2-50 focus:bg-gray2-50 hover:border-primary focus:border-primary">
                                            <div class="min-w-9 min-h-9 max-w-9 max-h-9 flex items-center justify-center rounded-full bg-gray2-50 group-hover:bg-white group-focus:bg-white">
                                                <img class="w-5 -mr-0.5" src="{{asset('site/svg/logo-ninja.svg')}}" alt="لوگو نینجا">
                                            </div>
                                            <div>
                                                <p class="font-semibold text-primary text-sm">پشتیبانی</p>
                                                <p class="mt-1 text-xs">{{$item->message}}</p>
                                                <p class="text-gray-700 mt-3 text-xs">{{jalaliDate($item->created_at, 'diffForHumans')}}</p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @auth
                            <div easytab-content x-bind:class="{ 'active': activeTab == 2 }">
                                <ul>
                                    @foreach($userNotifications as $item)
                                        <li>
                                            <div class="group flex items-start gap-2 py-3 px-2 border-r-3 border-transparent bg-white transition duration-200 ease-in-out hover:bg-gray2-50 focus:bg-gray2-50 hover:border-primary focus:border-primary">
                                                <div class="min-w-9 min-h-9 max-w-9 max-h-9 flex items-center justify-center rounded-full bg-gray2-50 group-hover:bg-white group-focus:bg-white">
                                                    <img class="w-5 -mr-0.5" src="{{asset('site/svg/logo-ninja.svg')}}" alt="لوگو نینجا">
                                                </div>
                                                <div>
                                                    <p class="font-semibold text-primary text-sm">پشتیبانی</p>
                                                    <p class="mt-1 text-xs">{{$item->note}}</p>
                                                    <p class="text-gray-700 mt-3 text-xs">{{jalaliDate($item->created_at, 'diffForHumans')}}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>

            <a href="{{route('cart')}}" class="w-7.5 h-7.5 flex items-center justify-center relative  transition duration-200 hover:text-primary focus:text-primary">
                <i class="icon-basket text-xl"></i>
                @if($basketCount > 0)
                    <div class="absolute -right-0.5 -top-0.5 bg-red text-white leading-0 text-center w-4 h-4 rounded-full
                 text-xs flex items-center justify-center">{{$basketCount}}</div>
                @endif
            </a>

            @guest
                <a href="{{route('auth')}}"
                   class="h-7.5 flex items-center justify-center relative gap-2 text-sm transition duration-200 hover:text-primary focus:text-primary">
                    <i class="icon-user"></i>
                    <p>ورود/عضویت</p>
                </a>
            @endguest
            @auth
                <a href="{{route('dashboard')}}"
                   class="h-7.5 flex items-center justify-center relative gap-2 text-sm transition duration-200 hover:text-primary focus:text-primary">
                    <i class="icon-user text-xl"></i>
                    <p>داشبورد</p>
                </a>
            @endauth
            <span class="hidden sm:flex pr-4 border-r border-gray2-500 text-sm">
                <a href="tel:{{$phone}}">{{$phone}}</a>
            </span>
        </div>
    </div>
</header>