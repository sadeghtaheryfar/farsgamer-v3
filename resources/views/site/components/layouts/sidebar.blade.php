<aside>
    <section id="sidebar-pc">
        <div id="padding-header"></div>

        <section id="box-hever-store" class="hide-item">
            <div id="clothe-box-hover-store" class="hide-item clothe-menu-store"></div>

            <div id="show-box-hever-store" class="open-menu-store">
                <div id="show-asli-box-hever-store">
                    <div id="box-header-box-hever-store">
                        <ul>
                            @foreach ($categories as $item)
                                <a href="#">
                                    <li id="item1-box-hever-store" class="item-box-hever-store header-box-hever-store">
                                        <div class="img">
                                            <img src="{{ asset($item['icon']) }}" alt="{{ $item['title'] }}">
                                        </div>

                                        <span>{{ $item['title'] }}</span>
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>


                    @foreach ($categories as $item)
                        <div class="box-message-box-hever-store hide-item">
                            <ul>
                                <li>
                                    <a href="{{ route('index.categories', $item['slug']) }}"
                                        class="item-box-hever-store">همه محصولات این دسته</a>
                                </li>

                                @foreach ($item['children_recursive'] as $item2)
                                    <li>
                                        <a href="{{ route('index.categories', $item2['slug']) }}"
                                            class="item-box-hever-store">{{ $item2['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="box-logo">
            <a href="{{ route('home') }}"><img src="{{ asset('site/images/logo.png') }}" alt="لوگو"></a>
        </div>

        <div class="box-menu">
            <ul class="ul-nav-menu">
                <a href="https://www.farsgamer.com/shop">
                    <li class="nav-menu-item nav-menu-item-store" id="menu1">
                        <div class="box-nav1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.56953 12.46L6.51953 15.51" stroke="#292D32" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M6.55078 12.49L9.60078 15.54" stroke="#292D32" stroke-width="1.5"
                                    stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.5293 14H13.5393" stroke="#292D32" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17.4707 14H17.4807" stroke="#292D32" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.5 15.98V15.96" stroke="#292D32" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.5 12.04V12.02" stroke="#292D32" stroke-width="2" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9 22H15C20 22 22 20 22 15V13C22 8 20 6 15 6H9C4 6 2 8 2 13V15C2 20 4 22 9 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M13.0105 2L13.0005 3.01C12.9905 3.56 12.5505 4 12.0005 4H11.9705C11.4205 4 10.9805 4.45 10.9805 5C10.9805 5.55 11.4305 6 11.9805 6H12.9805"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>


                            <span class="text-nav-menu">فروشگاه</span>
                        </div>

                        <svg width="9" height="18" viewBox="0 0 9 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </li>
                </a>

                <a href="{{ route('home') }}">
                    <li class="nav-menu-item {{ request()->routeIs('home') ? 'nav-menu-item-active' : '' }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.02 2.84004L3.63 7.04004C2.73 7.74004 2 9.23004 2 10.36V17.77C2 20.09 3.89 21.99 6.21 21.99H17.79C20.11 21.99 22 20.09 22 17.78V10.5C22 9.29004 21.19 7.74004 20.2 7.05004L14.02 2.72004C12.62 1.74004 10.37 1.79004 9.02 2.84004Z"
                                stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 17.99V14.99" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                        <span class="text-nav-menu">خانه</span>
                    </li>
                </a>

                <a href="{{ route('faqs') }}">
                    <li class="nav-menu-item {{ request()->routeIs('faqs') ? 'nav-menu-item-active' : '' }}"
                        id="menu3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.16992 7.43994L11.9999 12.5499L20.7699 7.46991" stroke="#374151"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 21.6099V12.5399" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M21.6106 12.83V9.17C21.6106 7.79 20.6206 6.11002 19.4106 5.44002L14.0706 2.48C12.9306 1.84 11.0706 1.84 9.9306 2.48L4.59061 5.44002C3.38061 6.11002 2.39062 7.79 2.39062 9.17V14.83C2.39062 16.21 3.38061 17.89 4.59061 18.56L9.9306 21.52C10.5006 21.84 11.2506 22 12.0006 22C12.7506 22 13.5006 21.84 14.0706 21.52"
                                stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M19.2 21.4C20.9673 21.4 22.4 19.9673 22.4 18.2C22.4 16.4327 20.9673 15 19.2 15C17.4327 15 16 16.4327 16 18.2C16 19.9673 17.4327 21.4 19.2 21.4Z"
                                stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M23 22L22 21" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                        <span class="text-nav-menu">پیگیری سفارش</span>
                    </li>
                </a>

                <a href="{{ route('faq') }}">
                    <li class="nav-menu-item {{ request()->routeIs('faq') ? 'nav-menu-item-active' : '' }}"
                        id="menu4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.98 10.79V14.79C17.98 15.05 17.97 15.3 17.94 15.54C17.71 18.24 16.12 19.58 13.19 19.58H12.79C12.54 19.58 12.3 19.7 12.15 19.9L10.95 21.5C10.42 22.21 9.56 22.21 9.03 21.5L7.82999 19.9C7.69999 19.73 7.41 19.58 7.19 19.58H6.79001C3.60001 19.58 2 18.79 2 14.79V10.79C2 7.86001 3.35001 6.27001 6.04001 6.04001C6.28001 6.01001 6.53001 6 6.79001 6H13.19C16.38 6 17.98 7.60001 17.98 10.79Z"
                                stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M21.9791 6.79001V10.79C21.9791 13.73 20.6291 15.31 17.9391 15.54C17.9691 15.3 17.9791 15.05 17.9791 14.79V10.79C17.9791 7.60001 16.3791 6 13.1891 6H6.78906C6.52906 6 6.27906 6.01001 6.03906 6.04001C6.26906 3.35001 7.85906 2 10.7891 2H17.1891C20.3791 2 21.9791 3.60001 21.9791 6.79001Z"
                                stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M13.4955 13.25H13.5045" stroke="#374151" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9.9955 13.25H10.0045" stroke="#374151" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M6.4955 13.25H6.5045" stroke="#374151" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                        <span class="text-nav-menu">سوالات متداول</span>
                    </li>
                </a>

                <a href="{{ route('rules') }}">
                    <li class="nav-menu-item {{ request()->routeIs('rules') ? 'nav-menu-item-active' : '' }}"
                        id="menu5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22 16.7399V4.66994C22 3.46994 21.02 2.57994 19.83 2.67994H19.77C17.67 2.85994 14.48 3.92994 12.7 5.04994L12.53 5.15994C12.24 5.33994 11.76 5.33994 11.47 5.15994L11.22 5.00994C9.44 3.89994 6.26 2.83994 4.16 2.66994C2.97 2.56994 2 3.46994 2 4.65994V16.7399C2 17.6999 2.78 18.5999 3.74 18.7199L4.03 18.7599C6.2 19.0499 9.55 20.1499 11.47 21.1999L11.51 21.2199C11.78 21.3699 12.21 21.3699 12.47 21.2199C14.39 20.1599 17.75 19.0499 19.93 18.7599L20.26 18.7199C21.22 18.5999 22 17.6999 22 16.7399Z"
                                stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 5.48999V20.49" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M7.75 8.48999H5.5" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8.5 11.49H5.5" stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                        <span class="text-nav-menu">قوانین</span>
                    </li>
                </a>

                <a href="{{ route('why-us') }}">
                    <li class="nav-menu-item {{ request()->routeIs('why-us') ? 'nav-menu-item-active' : '' }}"
                        id="menu7">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.49 2.23006L5.49997 4.11006C4.34997 4.54006 3.40997 5.90006 3.40997 7.12006V14.5501C3.40997 15.7301 4.18997 17.2801 5.13997 17.9901L9.43997 21.2001C10.85 22.2601 13.17 22.2601 14.58 21.2001L18.88 17.9901C19.83 17.2801 20.61 15.7301 20.61 14.5501V7.12006C20.61 5.89006 19.67 4.53006 18.52 4.10006L13.53 2.23006C12.68 1.92006 11.32 1.92006 10.49 2.23006Z"
                                stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M12 12.5C13.1046 12.5 14 11.6046 14 10.5C14 9.39543 13.1046 8.5 12 8.5C10.8954 8.5 10 9.39543 10 10.5C10 11.6046 10.8954 12.5 12 12.5Z"
                                stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 12.5V15.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="text-nav-menu">چرا فارس گیمر</span>
                    </li>
                </a>

                <a href="{{ route('contact-us') }}">
                    <li class="nav-menu-item {{ request()->routeIs('contact-us') ? 'nav-menu-item-active' : '' }}"
                        id="menu8">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z"
                                stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="#374151"
                                stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>


                        <span class="text-nav-menu">ارتباط با ما</span>
                    </li>
                </a>

                <a href="{{ route('articles') }}">
                    <li class="nav-menu-item {{ request()->routeIs('articles') ? 'nav-menu-item-active' : '' }}"
                        id="menu9">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.6602 10.44L20.6802 14.62C19.8402 18.23 18.1802 19.69 15.0602 19.39C14.5602 19.35 14.0202 19.26 13.4402 19.12L11.7602 18.72C7.59018 17.73 6.30018 15.67 7.28018 11.49L8.26018 7.30001C8.46018 6.45001 8.70018 5.71001 9.00018 5.10001C10.1702 2.68001 12.1602 2.03001 15.5002 2.82001L17.1702 3.21001C21.3602 4.19001 22.6402 6.26001 21.6602 10.44Z"
                                stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M15.0603 19.39C14.4403 19.81 13.6603 20.16 12.7103 20.47L11.1303 20.99C7.16034 22.27 5.07034 21.2 3.78034 17.23L2.50034 13.28C1.22034 9.30998 2.28034 7.20998 6.25034 5.92998L7.83034 5.40998C8.24034 5.27998 8.63034 5.16998 9.00034 5.09998C8.70034 5.70998 8.46034 6.44998 8.26034 7.29998L7.28034 11.49C6.30034 15.67 7.59034 17.73 11.7603 18.72L13.4403 19.12C14.0203 19.26 14.5603 19.35 15.0603 19.39Z"
                                stroke="#374151" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12.6406 8.53003L17.4906 9.76003" stroke="#374151" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M11.6602 12.4L14.5602 13.14" stroke="#374151" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>


                        <span class="text-nav-menu">مقاله ها</span>
                    </li>
                </a>

                <a href="request.html">
                    <li class="nav-menu-item {{ request()->routeIs('request') ? 'nav-menu-item-active' : '' }}"
                        id="menu10">
                        <svg id="icon-menu15" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1191_7585)">
                                <path class="fram-white"
                                    d="M14.4199 11.1901L17.59 14.36C17.7103 14.4942 17.7988 14.6538 17.849 14.827C17.8992 15.0001 17.9098 15.1823 17.8799 15.36C17.8447 15.6259 17.7215 15.8724 17.5299 16.0601C17.3447 16.255 17.097 16.3788 16.83 16.41C16.6477 16.4306 16.4631 16.4099 16.2899 16.3493C16.1168 16.2887 15.9596 16.1898 15.83 16.0601L12.6699 12.9001"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" />
                                <path class="fram-white"
                                    d="M14.4004 11.17L17.5604 14.3301C17.5829 14.3475 17.6031 14.3676 17.6205 14.3901V14.3901L14.4504 11.22"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" />
                                <path class="fram-white"
                                    d="M20.5496 12.73L20.2096 13.07L19.9896 13.29L19.6796 13.5999C19.6973 13.4178 19.6752 13.2341 19.6147 13.0614C19.5543 12.8887 19.457 12.7312 19.3296 12.5999L16.1595 9.42997L13.8496 7.12998C13.7946 7.07282 13.7285 7.02731 13.6555 6.99625C13.5825 6.96519 13.5039 6.94919 13.4246 6.94919C13.3452 6.94919 13.2666 6.96519 13.1936 6.99625C13.1206 7.02731 13.0547 7.07282 12.9996 7.12998L10.0796 10.04C9.92711 10.1938 9.74561 10.316 9.54565 10.3994C9.34569 10.4828 9.13119 10.5257 8.91455 10.5257C8.69791 10.5257 8.48341 10.4828 8.28345 10.3994C8.08349 10.316 7.90211 10.1938 7.74963 10.04V9.98996C7.63906 9.87612 7.57715 9.72368 7.57715 9.56498C7.57715 9.40627 7.63906 9.25383 7.74963 9.13999L12.0496 4.83994L12.3895 4.49997C12.9281 3.95879 13.5687 3.52983 14.2742 3.23801C14.9797 2.9462 15.7362 2.79732 16.4996 2.79996C17.2616 2.79754 18.0164 2.9466 18.7202 3.23844C19.4241 3.53028 20.0629 3.95909 20.5996 4.49997C21.1391 5.04234 21.5658 5.68606 21.8555 6.39408C22.1451 7.10209 22.2919 7.86044 22.2872 8.6254C22.2826 9.39036 22.1267 10.1468 21.8285 10.8512C21.5303 11.5557 21.0956 12.1942 20.5496 12.73V12.73Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M14.1901 17.8701L14.1201 17.8101L14.1801 17.8701H14.1901Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M12.4503 16.17L12.3203 16.04L12.3802 16.1L12.4503 16.17Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M20.0502 13.35L19.9902 13.29" stroke="#374151"
                                    stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white"
                                    d="M14.4004 11.17L17.5604 14.3301C17.5829 14.3475 17.6031 14.3676 17.6205 14.3901V14.3901L14.4504 11.22"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" />
                                <path class="fram-white"
                                    d="M12.6599 12.91L15.8199 16.0701C15.9497 16.1997 16.0485 16.357 16.1091 16.5301C16.1697 16.7032 16.1905 16.8878 16.1699 17.0701C16.1348 17.336 16.0116 17.5824 15.8199 17.7701C15.6347 17.965 15.3871 18.0888 15.12 18.1201C14.9422 18.1499 14.7599 18.1394 14.5868 18.0892C14.4137 18.039 14.2542 17.9504 14.12 17.8301L14.0599 17.7701C13.8342 17.577 13.5471 17.4706 13.25 17.47C12.9239 17.471 12.6113 17.6004 12.3799 17.8301C12.5998 17.6117 12.7292 17.3184 12.7422 17.0088C12.7552 16.6992 12.6508 16.396 12.45 16.16L12.3799 16.09L12.3199 16.03C12.0942 15.837 11.807 15.7306 11.5099 15.73C11.1838 15.731 10.8713 15.8603 10.6399 16.09C10.7542 15.9758 10.8449 15.8402 10.9067 15.6909C10.9686 15.5416 11.0005 15.3816 11.0005 15.22C11.0005 15.0584 10.9686 14.8985 10.9067 14.7492C10.8449 14.5999 10.7542 14.4643 10.6399 14.35C10.5255 14.2367 10.3896 14.1474 10.2402 14.0873C10.0908 14.0272 9.93091 13.9976 9.7699 14.0001C9.60896 13.9981 9.44924 14.0281 9.29993 14.0881C9.15061 14.1482 9.01466 14.2372 8.8999 14.35C9.01389 14.2367 9.10441 14.1019 9.16614 13.9534C9.22786 13.805 9.25964 13.6458 9.25964 13.485C9.25964 13.3243 9.22786 13.1651 9.16614 13.0167C9.10441 12.8682 9.01389 12.7334 8.8999 12.6201C8.78736 12.5035 8.65212 12.4115 8.50244 12.3495C8.35276 12.2876 8.19187 12.2571 8.02991 12.2601C7.86803 12.2577 7.70745 12.2884 7.55786 12.3503C7.40827 12.4122 7.27281 12.504 7.15991 12.6201L5.92993 13.85C5.79956 13.9793 5.70029 14.1364 5.63965 14.3097C5.57901 14.4829 5.55862 14.6677 5.57996 14.85L3.44995 12.73C2.3615 11.6391 1.75019 10.1611 1.75 8.62006C1.74978 7.85843 1.89981 7.10424 2.19153 6.4007C2.48324 5.69715 2.91085 5.05809 3.44995 4.52008C3.98867 3.98037 4.6285 3.55216 5.33289 3.26001C6.03727 2.96786 6.79237 2.8175 7.55493 2.8175C8.3175 2.8175 9.07259 2.96786 9.77698 3.26001C10.4814 3.55216 11.1212 3.98037 11.6599 4.52008L12 4.86005L7.69995 9.16003C7.58938 9.27388 7.52747 9.42638 7.52747 9.58508C7.52747 9.74379 7.58938 9.89623 7.69995 10.0101V10.0601C7.85243 10.214 8.03393 10.3361 8.23389 10.4195C8.43385 10.5029 8.64835 10.5458 8.86499 10.5458C9.08163 10.5458 9.29613 10.5029 9.49609 10.4195C9.69605 10.3361 9.87743 10.214 10.0299 10.0601L12.95 7.15009C13.005 7.09292 13.071 7.04742 13.144 7.01636C13.2171 6.9853 13.2956 6.9693 13.375 6.9693C13.4544 6.9693 13.5328 6.9853 13.6058 7.01636C13.6789 7.04742 13.7449 7.09292 13.7999 7.15009L16.11 9.45007"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M12.4503 16.17L12.3203 16.04L12.3802 16.1L12.4503 16.17Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M14.1901 17.8701L14.1201 17.8101L14.1801 17.8701H14.1901Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white"
                                    d="M8.89969 14.3601L7.6697 15.6C7.54049 15.7304 7.38336 15.8297 7.21011 15.8903C7.03686 15.951 6.85202 15.9714 6.6697 15.9501C6.38721 15.922 6.12271 15.7985 5.9197 15.6C5.71706 15.4 5.5929 15.1339 5.56973 14.85C5.5484 14.6677 5.56878 14.483 5.62942 14.3097C5.69006 14.1364 5.78934 13.9793 5.9197 13.85L7.18972 12.6201C7.30262 12.504 7.43796 12.4123 7.58755 12.3504C7.73714 12.2885 7.89784 12.2578 8.05972 12.2601C8.22168 12.2572 8.38245 12.2876 8.53213 12.3496C8.68181 12.4115 8.81717 12.5036 8.92971 12.6201C9.04328 12.7356 9.13272 12.8726 9.19278 13.023C9.25283 13.1735 9.28236 13.3344 9.27957 13.4963C9.27678 13.6583 9.24175 13.8181 9.17654 13.9664C9.11133 14.1147 9.01716 14.2485 8.89969 14.3601Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white"
                                    d="M10.6399 16.1L9.40994 17.34C9.28072 17.4704 9.1236 17.5696 8.95034 17.6303C8.77709 17.6909 8.59225 17.7114 8.40994 17.69C8.12745 17.6619 7.86294 17.5384 7.65994 17.34C7.45729 17.1399 7.33313 16.8738 7.30996 16.59C7.28863 16.4077 7.30902 16.2229 7.36966 16.0496C7.43029 15.8764 7.52957 15.7192 7.65994 15.59L8.88992 14.35C9.00468 14.2372 9.14063 14.1482 9.28994 14.0881C9.43926 14.028 9.59898 13.9981 9.75991 14C9.92092 13.9975 10.0809 14.0272 10.2303 14.0873C10.3796 14.1474 10.5155 14.2367 10.6299 14.35C10.7464 14.4637 10.8391 14.5995 10.9027 14.7494C10.9663 14.8992 10.9996 15.0601 11.0005 15.2229C11.0014 15.3857 10.9701 15.547 10.9082 15.6976C10.8463 15.8482 10.7551 15.9849 10.6399 16.1V16.1Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white"
                                    d="M12.3802 17.84L11.1502 19.08C11.021 19.2104 10.8638 19.3096 10.6906 19.3702C10.5173 19.4309 10.3325 19.4513 10.1502 19.43C9.86768 19.4019 9.60318 19.2785 9.40017 19.08C9.19753 18.8799 9.07337 18.6138 9.0502 18.33C9.02887 18.1477 9.04925 17.9629 9.10989 17.7897C9.17053 17.6164 9.2698 17.4592 9.40017 17.33L10.6302 16.09C10.8615 15.8603 11.1742 15.7309 11.5003 15.73C11.7973 15.7306 12.0844 15.8369 12.3102 16.03L12.4402 16.16C12.6453 16.3953 12.7531 16.6999 12.742 17.0118C12.7308 17.3238 12.6015 17.6198 12.3802 17.84Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M12.4503 16.17L12.3203 16.04L12.3802 16.1L12.4503 16.17Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white"
                                    d="M14.4803 18.8C14.4625 19.096 14.334 19.3745 14.1203 19.58L12.8902 20.82C12.6784 21.0233 12.4029 21.147 12.1103 21.17H11.9002C11.617 21.1443 11.3518 21.0205 11.1502 20.82C10.9475 20.6199 10.8234 20.3538 10.8002 20.07C10.7789 19.8877 10.7993 19.7029 10.8599 19.5297C10.9205 19.3564 11.0198 19.1992 11.1502 19.07L12.3802 17.83C12.6115 17.6003 12.9242 17.4709 13.2503 17.47C13.5473 17.4705 13.8344 17.5769 14.0602 17.77L14.1302 17.83C14.2536 17.9579 14.3486 18.1104 14.409 18.2775C14.4693 18.4447 14.4936 18.6228 14.4803 18.8V18.8Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white" d="M14.1901 17.8701L14.1201 17.8101L14.1801 17.8701H14.1901Z"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10" />
                                <path class="fram-white"
                                    d="M16.1897 9.45007L19.3597 12.6201C19.4872 12.7513 19.5845 12.9088 19.6449 13.0815C19.7053 13.2542 19.7275 13.438 19.7097 13.6201C19.6889 13.9074 19.5646 14.1775 19.3597 14.3801C19.1502 14.5823 18.8793 14.709 18.5897 14.7401C18.4195 14.7538 18.2482 14.7325 18.0865 14.6774C17.9249 14.6224 17.7762 14.5348 17.6497 14.42V14.42C17.6322 14.3976 17.6121 14.3775 17.5897 14.36L14.4297 11.2001"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" />
                                <path class="fram-white"
                                    d="M14.4004 11.17L17.5604 14.3301C17.5829 14.3475 17.6031 14.3676 17.6205 14.3901V14.3901L14.4504 11.22"
                                    stroke="#374151" stroke-width="1.5" stroke-miterlimit="10"
                                    stroke-linecap="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1191_7585">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <span class="text-nav-menu">درخواست همکاری</span>
                    </li>
                </a>
            </ul>

            <div id="hover-store-mobile">
                <div class="header-store-mobile">
                    <span>دسته بندی ها</span>
                </div>

                <div class="message-store-mobile">
                    @foreach ($categories as $item)
                        <div class="item-header-mobile open-box-category">
                            <span>{{ $item['title'] }}</span>

                            <img src="{{ asset('site-v2/img/Vector.svg') }}"
                                class="icon-header-store-mbile icon-category-header-store" alt="">
                        </div>
                        <div class="hide-item message-header-sore message-category-store-mobile">
                            <ul>
                                <li>
                                    <a href="{{ route('index.categories', $item['slug']) }}">همه محصولات این دسته</a>
                                </li>

                                @foreach ($item['children_recursive'] as $item2)
                                    <li>
                                        <a href="{{ route('index.categories', $item2['slug']) }}">
                                            {{ $item2['title'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section id="box-clothe-menu-mobile" class="hide-item open-menu-mobile"></section>
</aside>
