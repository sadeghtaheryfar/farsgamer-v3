<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <div class="brand flex-column-auto " id="kt_brand">

        <a href="#" class="brand-logo">
            <img alt="Logo" src="{{asset('site/images/farsgamer.png')}}"/>
        </a>

        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
				<span class="svg-icon svg-icon svg-icon-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none"
                                                                                                                            fill-rule="evenodd"><polygon
                                    points="0 0 24 0 24 24 0 24"/><path
                                    d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                    fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/><path
                                    d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"
                                    transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/></g></svg>
                </span>
        </button>
    </div>
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
				@if(request()->routeIs(['cart.checkout','partner.wallet','partner.orders','partner.setting','partner.profile','partner.new.orders','partner.order','partner.store.new.orders','partner.dashboard']))
				<x-admin.sidebar-link href="{{route('partner.dashboard')}}" :active="request()->routeIs('partner.dashboard')" icons="flaticon-home-2">داشبورد</x-admin.sidebar-link>
				
					<x-admin.sidebar-link href="{{route('partner.new.orders')}}"
                                          :active="request()->routeIs(['partner.new.orders','partner.store.new.orders'])" icons="fa fa-plus">سفارش جدید
                    </x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('partner.orders')}}"
                                          :active="request()->routeIs(['partner.orders','partner.order'])" icons="flaticon2-box-1">سفارش های من
                    </x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('partner.profile')}}"
                                          :active="request()->routeIs('partner.profile')" icons="flaticon-settings-1">پروفایل 
                    </x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('partner.wallet')}}"
                                          :active="request()->routeIs('partner.wallet')" icons="flaticon-coins">کیف پول 
                    </x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('partner.setting')}}"
                                          :active="request()->routeIs('partner.setting')" icons="flaticon-settings-1">تنظیمات 
                    </x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('dashboard')}}"
                                          :active="request()->routeIs('dashboard')" icons="flaticon2-user-1">پنل کاربری
                    </x-admin.sidebar-link>
				@else
				
                <x-admin.sidebar-link href="{{route('admin.dashboard')}}" :active="request()->routeIs('admin.dashboard')" icons="flaticon-home-2">{{ auth()->user()->translate('داشبورد') }}</x-admin.sidebar-link>
				<li class="menu-section">
                    <h4 class="menu-text">بخش شخصی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<x-admin.sidebar-link href="{{route('dashboard')}}" :active="request()->routeIs('dashboard')" icons="flaticon-user">پروفایل</x-admin.sidebar-link>
				<x-admin.sidebar-link href="{{route('admin.my.forms')}}" :active="request()->routeIs('admin.my.forms')" icons="flaticon-user">گزارش های من ({{ auth()->user()->forms()->where('status',\App\Models\AdminForm::PENDING)->count() }})</x-admin.sidebar-link>
				<li class="menu-section">
                    <h4 class="menu-text">بخش عمومی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				@can('product_manager')
                    <x-admin.sidebar-link href="{{route('admin.products.order')}}"
                                          :active="request()->routeIs('admin.products.order')" icons="flaticon2-box-1">{{ auth()->user()->translate('سفارشات شما') }}
                    </x-admin.sidebar-link>
                @endcan

								@can('show_orders')
                    {{--                    <x-admin.multiplesidebar-link title="{{ auth()->user()->translate('سفارشات') }} ({{\App\Models\OrderDetail::where('status', \App\Models\Order::STATUS_PROCESSING)->count()}})"--}}
                    {{--                                                  :active="request()->routeIs(['admin.orders'])">--}}
                    {{--                        <x-admin.sidebar-link href="{{route('admin.orders')}}" icon="menu-bullet menu-bullet-dot"--}}
                    {{--                                              :active="request()->routeIs('admin.orders')">{{ auth()->user()->translate('همه') }}</x-admin.sidebar-link>--}}
                    {{--                        @foreach(\App\Models\Category::whereNull('parent_id')->get() as $item)--}}
                    {{--                            <x-admin.sidebar-link href="{{route('admin.orders', ['category' => $item->id])}}" icon="menu-bullet menu-bullet-dot"--}}
                    {{--                                                  :active="request()->routeIs('admin.orders')">{{$item->title}}</x-admin.sidebar-link>--}}
                    {{--                        @endforeach--}}
                    {{--                    </x-admin.multiplesidebar-link>--}}
                    <x-admin.multiplesidebar-link title="{{ auth()->user()->translate('سفارشات') }}"
                                                  :active="request()->routeIs(['admin.orders'])" icons="flaticon2-box-1">
                        <x-admin.sidebar-link href="{{route('admin.orders')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.orders')" icons="flaticon2-box-1">{{ auth()->user()->translate('همه') }}
                            ({{\App\Models\OrderDetail::where('status', \App\Models\Order::STATUS_PROCESSING)->orWhere('status', \App\Models\Order::STATUS_DELAY)->count()}})
                        </x-admin.sidebar-link>
                        @foreach(\App\Models\Category::whereNull('parent_id')->get() as $item)
                            <x-admin.sidebar-link href="{{route('admin.orders', ['category' => $item->id])}}" icon="menu-bullet menu-bullet-dot"
                                                  :active="request()->routeIs('admin.orders')" icons="flaticon2-box-1">{{ auth()->user()->translate($item->title) }}
                                ({{        \App\Models\OrderDetail::whereHas('product', function ($query) use ($item){
            return $query->whereHas('category', function ($query) use ($item){
                return $query->where('parent_id', $item->id);
            });
        })->where(function($query) {
            return $query->where('status', \App\Models\Order::STATUS_PROCESSING)->orWhere('status', \App\Models\Order::STATUS_DELAY);
        })->count()}})
                            </x-admin.sidebar-link>
                        @endforeach
                    </x-admin.multiplesidebar-link>
                @endcan
				@can('show_comments')
                    <x-admin.sidebar-link href="{{route('admin.comments')}}" :active="request()->routeIs('admin.comments')" icons="flaticon-comment">نظرات
                        ({{\App\Models\Comment::where('is_confirmed', 0)->count()}})
                    </x-admin.sidebar-link>
                @endcan
				@can('show_questions')
                    <x-admin.sidebar-link href="{{route('admin.questions')}}" :active="request()->routeIs('admin.questions')" icons="flaticon-chat">پرسش و پاسخ
                        ({{\App\Models\Question::where('is_confirmed', 0)->count()}})
                    </x-admin.sidebar-link>
                @endcan
				@can('show_tickets')	
                    <x-admin.sidebar-link href="{{route('admin.ticket')}}"
                                          :active="request()->routeIs(['admin.ticket','admin.store.ticket'])" icons="fas fa-ticket-alt">تیکت ها
                    </x-admin.sidebar-link>
                @endcan
				<li class="menu-section">
                    <h4 class="menu-text">بخش خصوصی و فنی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				@can('show_articles')
				<x-admin.multiplesidebar-link title="مقالات" :active="request()->routeIs(['admin.articles','admin.articlesCat'])" icons="flaticon-notepad">
					
					<x-admin.sidebar-link href="{{route('admin.articles')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.articles')" icons="flaticon-notepad">مقالات 
                        </x-admin.sidebar-link>
					 <x-admin.sidebar-link href="{{route('admin.articlesCat')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.articlesCat')" icons="flaticon-notepad">دسته بندی
                        </x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('admin.guaranteed')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.guaranteed')" icons="flaticon-notepad">سایت های تضمین شده 
                        </x-admin.sidebar-link>	
				</x-admin.multiplesidebar-link>
                    
                @endcan
				@can('show_currencies')
                    <x-admin.sidebar-link href="{{route('admin.currencies')}}" :active="request()->routeIs('admin.currencies')" icons="flaticon-coins">{{ auth()->user()->translate('واحد پول') }}</x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('admin.wallet')}}" :active="request()->routeIs('admin.wallet')" icons="flaticon-coins">کیف پول</x-admin.sidebar-link>
                @endcan
				@can('show_vouchers')
                    <x-admin.sidebar-link href="{{route('admin.vouchers')}}" :active="request()->routeIs('admin.vouchers')" icons="flaticon-price-tag">کدهای تخفیف</x-admin.sidebar-link>
                @endcan

				
				@can('show_users')

					<x-admin.sidebar-link href="{{route('admin.partners')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.partners')" icons="flaticon-user">همکار ها
                        </x-admin.sidebar-link>
                    <x-admin.multiplesidebar-link title="کاربران ({{ App\Models\User::where('auth_status',App\Models\User::UESR_PENDING)->count() }})" :active="request()->routeIs(['admin.users','admin.roles'])" icons="flaticon-user">
                        <x-admin.sidebar-link href="{{route('admin.users')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.users')" icons="flaticon-user">  کاربران ({{ App\Models\User::where('auth_status',App\Models\User::UESR_PENDING)->count() }})
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.roles')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.roles')" icons="flaticon-user">نقش ها
                        </x-admin.sidebar-link>
						
                        @if(auth()->user()->hasRole('administrator'))
                            <x-admin.sidebar-link href="{{route('admin.transaction')}}" icon="menu-bullet menu-bullet-dot"
                                                  :active="request()->routeIs('admin.transaction')" icons="flaticon-user">تراکنش ها
                            </x-admin.sidebar-link>
                        @endif
                    </x-admin.multiplesidebar-link>
                @endcan
				@can('show_products')
                    <x-admin.sidebar-link href="{{route('admin.products')}}"
                                          :active="request()->routeIs('admin.products')" icons="flaticon2-box-1">{{ auth()->user()->translate('محصولات وب سایت ') }}
                    </x-admin.sidebar-link>
                @endcan
				@can('depot')	
                    <x-admin.sidebar-link href="{{route('admin.depot')}}"
                                          :active="request()->routeIs('admin.depot')" icons="fas fa-warehouse">انبار
                    </x-admin.sidebar-link>
				{{--	<x-admin.sidebar-link href="{{route('admin.digital_depot')}}"
                                          :active="request()->routeIs('admin.digital_depot')" icons="fas fa-warehouse">انبار دیجیتال
                    </x-admin.sidebar-link> --}}
                @endcan
				@can('show_lottery')
                    <x-admin.sidebar-link href="{{route('admin.lottery')}}" :active="request()->routeIs('admin.lottery')" icons="flaticon-doc">پنل قرعه کشی</x-admin.sidebar-link>
                @endcan
				 @can('show_categories')
                    <x-admin.sidebar-link href="{{route('admin.categories')}}" :active="request()->routeIs('admin.categories')" icons="flaticon-list-3">{{ auth()->user()->translate('دسته ها') }}</x-admin.sidebar-link>
                @endcan
				<li class="menu-section">
                    <h4 class="menu-text">بخش گزارشات</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				@can('reports','report_manager')	
                    <x-admin.multiplesidebar-link title="گزارش کار ها" :active="request()->routeIs(['admin.forms','admin.forms.store','admin.admin.forms', 'admin.admin.forms.store'])" icons="flaticon-list">
					@can('reports')
                        <x-admin.sidebar-link href="{{route('admin.forms')}}" icons="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.forms')">گزارشات
                        </x-admin.sidebar-link>
						@endcan
						<x-admin.sidebar-link href="{{route('admin.admin.forms')}}" icons="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.admin.forms')" >بایگانی ها
											  ({{ \App\Models\AdminForm::where('status',\App\Models\AdminForm::PENDING)->count() }})
                        </x-admin.sidebar-link>
                        
                        
                    </x-admin.multiplesidebar-link>
                @endcan
				@can('license')	
                    <x-admin.sidebar-link href="{{route('admin.license')}}"
                                          :active="request()->routeIs('admin.license')" icons="flaticon-layer">{{ auth()->user()->translate('لایسنس ها') }}
                    </x-admin.sidebar-link>
                @endcan
				@can('show_logs')
                    <x-admin.sidebar-link href="{{route('admin.logs')}}" :active="request()->routeIs('admin.logs')" icons="flaticon-doc">لاگ ها</x-admin.sidebar-link>
                @endcan
				@can('show_analytics')
                    <x-admin.sidebar-link href="{{route('admin.analytics.vouchers')}}"
                                          :active="request()->routeIs('admin.analytics.vouchers')" icons="flaticon-pie-chart-1">آمار کدهای تخفیف
                    </x-admin.sidebar-link>
                @endcan
				@if(auth()->user()->hasRole('مدیر محصول'))
					<x-admin.sidebar-link href="{{route('admin.users')}}" :active="request()->routeIs('admin.users')" icons="flaticon-user">{{ auth()->user()->translate('کارمندان') }}</x-admin.sidebar-link>
				@endif
				<li class="menu-section">
                    <h4 class="menu-text">بخش نظیمات عمومی</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
				<x-admin.sidebar-link href="{{route('admin.myLanguage')}}"
                                          :active="request()->routeIs('admin.myLanguage')" icons="flaticon-map-location"> languages
                    </x-admin.sidebar-link>
					@can('show_settings')
                    <x-admin.sidebar-link href="{{route('admin.teams')}}" :active="request()->routeIs('admin.teams')" icons="flaticon-user-ok">تیم ما</x-admin.sidebar-link>
					<x-admin.sidebar-link href="{{route('admin.windows')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.windows')" icons="flaticon-settings-1">ویترین ها 
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.faqs')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.faqs')" icons="flaticon-settings-1">سوالات متداول
                        </x-admin.sidebar-link>
						<x-admin.sidebar-link href="{{route('admin.notifications')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.notifications')" icons="flaticon-settings-1">اعلانات
                        </x-admin.sidebar-link>
						<x-admin.sidebar-link href="{{route('admin.languages')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.languages')" icons="flaticon-settings-1">زبان ها
                        </x-admin.sidebar-link>
                	@endcan
				@can('show_settings')
                    <x-admin.multiplesidebar-link title="تنظیمات" :active="request()->routeIs(['admin.settings','admin.homes','admin.faqs', 'admin.rules','admin.windows','admin.languages'])" icons="flaticon-settings-1">
                        <x-admin.sidebar-link href="{{route('admin.settings')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.settings')" icons="flaticon-settings-1">تنظیمات
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.homes')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.homes')" icons="flaticon-settings-1">صفحه اصلی
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.banner')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.banner')" icons="flaticon-settings-1">بنر ها
                        </x-admin.sidebar-link>
						
                        <x-admin.sidebar-link href="{{route('admin.rules')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.rules')" icons="flaticon-settings-1">قوانین
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.physical')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.physical')" icons="flaticon-settings-1">قوانین محصولات فیزیکی
                        </x-admin.sidebar-link>
						<x-admin.sidebar-link href="{{route('admin.card')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.card')" icons="flaticon-settings-1">قوانین کارت ها
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.streams')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.streams')" icons="flaticon-settings-1">استریمرها
                        </x-admin.sidebar-link>
                        <x-admin.sidebar-link href="{{route('admin.sms')}}" icon="menu-bullet menu-bullet-dot"
                                              :active="request()->routeIs('admin.sms')" icons="flaticon-settings-1">پیامک
                        </x-admin.sidebar-link>
                        
                    </x-admin.multiplesidebar-link>
                @endcan
				@endif
				<x-admin.sidebar-link href="{{route('logout')}}" :active="request()->routeIs('logout')" icons="flaticon-logout">خروج</x-admin.sidebar-link>
            </ul>
        </div>
    </div>
</div>