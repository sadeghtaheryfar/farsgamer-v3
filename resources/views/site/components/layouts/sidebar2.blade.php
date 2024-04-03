<sidebar id="sidebar" > 
    <div id="sidebar__content">
       
        <div id="sidebar__scrollable-content" class="overflow-y-auto max-h-full px-4 pb-6">


            <form class="flex mt-4 lg:hidden relative w-full">
                <input id="search-two" class="text-field h-12 pr-10 pl-2 text-sm w-full" type="text" placeholder="جستجو در محصولات فارس گیمر"
                       wire:keydown.enter="updateSearch()" wire:model.lazy="search">
                <label class="absolute h-full top-0 right-2 bottom-0 flex items-center justify-center mb-0 cursor-text" for="search-two" wire:click="updateSearch()">
                    <i class="icon-search w-8 flex items-center justify-center text-gray2-700"></i>
                </label>
            </form>
            <nav class="py-4">
                <ul style="margin-right: -4px;">
					<div>
					<li>
						<a class="nav-menu-item">
							<i class="nav-menu-item__icon icon-controler"></i>
							<span class="nav-menu-item__title store-lable">فروشگاه</span>
							<i class="fas fa-chevron-left" style="margin-right: 70px;"></i>
						</a>
						<small class="menu_proucts">محصولات</small>
					</li>
						<div style="position: unset;" class="menu r_menu r_menu_height">
							<div class="container">
								<div class="row">
									<div class="col-lg-5 col-sm-12 col-12 bg-white px-0">
										<div class="base-category col-12 py-2">
											@foreach($categories as $item)
												<div class="category">
													<div class="d-flex align-items-center justify-content-start" data-id="{{ $item['id'] }}">
														<div class="px-2"><img src="{{ asset($item['icon'] ) }}" alt=""></div>
														<a data-id="{{ $item['id'] }}" href="" class="d-none d-lg-block d-xl-block">
															{{ @$item['window'] ? $item['window']['slug'] : $item['title'] }}
														</a>
														<a data-id="{{ $item['id'] }}" class="d-block d-lg-none d-xl-none position-relative" style="z-index: -1;">
															{{ @$item['window'] ? $item['window']['slug'] : $item['title'] }}
														</a>
													</div>
													<div class="d-block d-lg-none d-xl-none">
														<div class="sub-categories">
															<div class="sub_category" data-response-id="{{ $item['id'] }}">
																<ul>
																	<li>
																		<div class="px-2">
																			<a href="{{ route('index.categories',$item['slug']) }}">همه محصولات این دسته</a>
																			<i class="fas fa-chevron-left text-secondary"></i>
																		</div>
																	</li>
																	@foreach($item['children_recursive'] as $item2)
																	<li>
																		<div class="px-2">
																			<a href="{{ route('index.categories',$item2['slug']) }}">
																				{{ @$item2['window'] ? $item2['window']['slug'] : $item2['title'] }}
																			</a>
																			<i class="fas fa-chevron-left text-secondary"></i>
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

									<div id="sub-categories" class="col-lg-7 d-none d-lg-block d-xl-block bg-white px-0">
										<div class="sub-categories">
											@foreach(array_column($categories, 'children_recursive') as $item)
												<div class="sub_category" id="{{$item[0]['parent_id']}}">
													<ul>
														@foreach($item as $value)
															<li>
																<div class="px-2">
																	<a href="{{ route('index.categories',$value['slug']) }}">
																		{{ @$value['window'] ? $value['window']['slug'] : $value['title'] }}
																	</a>
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
											@foreach($categories as $item)
											<div class="category">
												<div class="d-flex align-items-center justify-content-start" data-id="{{ $item['id'] }}">
													<div data-id="{{ $item['id'] }}" class="px-2"><img src="{{ asset($item['icon'] ) }}"></div>
													<a data-id="{{ $item['id'] }}" href="{{ route('index.categories',$item['slug']) }}" class="d-none d-lg-block d-xl-block">
														{{ @$item['window'] ? $item['window']['slug'] : $item['title'] }}
													</a>
													<a data-id="{{ $item['id'] }}" href="{{ route('index.categories',$item['slug']) }}" class="d-block d-lg-none d-xl-none position-relative" style="z-index: -1;">
													
														{{ @$item['window'] ? $item['window']['slug'] : $item['title'] }}
													</a>
												</div>
											</div>
											@endforeach
										</div>
									</div>

									<div id="sub-categories" class="col-lg-7 d-none d-lg-block d-xl-block bg-white px-0">
										<div class="sub-categories">
										@foreach(array_column($categories, 'children_recursive') as $item)
											@if(!empty($item))
												<div class="sub_category" id="c{{$item[0]['parent_id']}}">
													<ul>
														@foreach($item as $value)
															<li>
																<div class="px-2">
																	<a href="{{ route('index.categories',$value['slug']) }}">
																	{{ @$value['window'] ? $value['window']['slug'] : $value['title'] }}
																	</a>
																</div>
															</li>
														@endforeach
													</ul>
												</div>
											@endif
										@endforeach
											
										</div>
									</div>

								</div>
							</div>
						</div>
					<hr class="border-gray-200 mb-4 mt-4" style="margin-right: 8px;">
                    <x-site.sidebar-link :active="request()->routeIs('home')" icon="icon-home" href="{{route('home')}}">
                        <span class="store-lable">خانه</span>
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('faqs')" icon="icon-search" href="{{route('faqs')}}">
						<span class="store-lable">پیگیری سفارش</span>
                          
                    </x-site.sidebar-link>
					<x-site.sidebar-link :active="request()->routeIs('faq')" icon="icon-question-answer" href="{{route('faq')}}">
						<span class="store-lable">سوالات متداول</span>
                         
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('rules')" icon="icon-law" href="{{route('rules')}}">
						<span class="store-lable">قوانین</span>
                        
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('contact-us')" icon="icon-mail" href="{{route('contact-us')}}">
					<span class="store-lable">ارتباط با ما</span>
                          
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs('why-us')" icon="icon-fortnite" href="{{route('why-us')}}">
						<span class="store-lable"> چرا فارس گیمر</span>
                         
                    </x-site.sidebar-link>
                    <x-site.sidebar-link :active="request()->routeIs(['articles', 'articles.show'])" icon="icon-articles" href="{{route('articles')}}">
						<span class="store-lable">   مقالات</span>
                        
                    </x-site.sidebar-link>
                </ul>
            </nav>

            <hr class="border-gray-200 mb-4">

            <div>
                
                <ul class="grid gap-2 order-details">
			
                   
                            

							<li>
								<i class="last-orders"></i>
								<p>
									<b>{{$ordersLasts}}</b>
									<small class="store-lable">سفارش تکمیل شده 24 ساعت اخیر</small>
								<p>
							</li>
							<li>
								<i class="online-orders"></i>
								<p>
									<b>{{$ordersOnlines}}</b>
									<small class="store-lable">سفارش در حال انجام</small>
								<p>
							</li>
                   
                </ul>
            </div>

        </div>
    </div>
</sidebar>