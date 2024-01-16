<footer class="flex-box">
    <div class="grid justify-center justify-items justify-items-center grid-cols-2 lg:flex lg:grid-cols-4 gap-2 my-8">
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-lock w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">حفظ اطلاعات</p>
        </div>
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-support w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">پشتیبانی 24 ساعته</p>
        </div>
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-ticket w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">ضمانت پرداخت</p>
        </div>
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-bigclock w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">ثبت سفارش فوری</p>
        </div>
    </div>

    <div class="about-footer">
        <p>{!! $footerDescription !!}</p>
    </div>

    <div class="box-buttom-footer flex-box">
        <div class="item-right-box-buttom-footer">
            <div>
                <div class="address-footer">
                    <div class="header-address-footer">
                        <div class="text-header-address-footer">
                            <span>آدرس :</span>
                        </div>

                        <div class="border-header-address-footer"></div>
                    </div>

                    <div class="message-address-footer">
                        <span>{{ $address }}</span>
                    </div>
                </div>

                <div class="clock-footer">
                    <div class="header-address-footer">
                        <div class="text-header-address-footer">
                            <span>ساعت کاری :</span>
                        </div>

                        <div class="border-header-address-footer"></div>
                    </div>

                    <div class="message-address-footer">
                        <div class="flex-box item-message-clock-footer">
                            <div class="text-messag-clock-right">
                                <span>شنبه تا پنج شنبه</span>
                            </div>

                            <div class="border-header-clock-footer"></div>

                            <div class="text-messag-clock-left">
                                <span class="whitespace-nowrap text-sm">از ساعت 10 صبح الی 12 بامداد</span>
                            </div>
                        </div>

                        <div class="flex-box item-message-clock-footer">
                            <div class="text-messag-clock-right">
                                <span>جمعه</span>
                            </div>

                            <div class="border-header-clock-footer"></div>

                            <div class="text-messag-clock-left">
                                <span>15:00 الی 21:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tell-footer">
                <span>تلفن تماس</span>

                <span>|</span>

                <a class="link link-transition font-semibold" href="tel:{{ $phone }}">{{ $phone }}</a>
            </div>
        </div>

        <div class="social-footer flex-box">
            <div class="header-social-footer">
                <h6 class="font-semibold mb-2">فارس گیمر در شبکه های اجتماعی</h6>
            </div>

            <div class="flex gap-4 justify-center">
                <a class="w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="{{ $twitter['url'] ?? '' }}">
                    <i
                        class="icon-twitter text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
                <a class="w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="{{ $instagram['url'] ?? '' }}">
                    <i
                        class="icon-instagram text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
                <a class="w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="{{ $telegram['url'] ?? '' }}">
                    <i
                        class="icon-telegram-plane text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
                <a class="discord-link w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="https://discord.gg/2kYFXHh3">
                    <i
                        class="icon_discord text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
            </div>
        </div>

        <div class="trust-footer flex-box">
            <div class="flex-box">
                <h6 class="font-semibold text-center xl:text-center">نماد اعتماد</h6>
            </div>

            <div class="box-trust flex-box">
                <div class="box-item-trust flex-box">
                    <div class="itme-trust">
                        <a referrerpolicy="origin" target="_blank"
                            href="https://trustseal.enamad.ir/?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT"><img
                                referrerpolicy="origin"
                                src="https://Trustseal.eNamad.ir/logo.aspx?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT"
                                alt="" style="cursor:pointer" id="yECDeYH06VHLxw3VZRBT"></a>
                    </div>

                    <div class="itme-trust">
                        <img id='nbqergvjoeuksizpjzpesizp' style ='cursor:pointer'
                            onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=238979&p=uiwkxlaomcsipfvljyoepfvl", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                            alt ='logo-samandehi'
                            src='https://logo.samandehi.ir/logo.aspx?id=238979&p=odrfqftiaqgwbsiyyndtbsiy' />
                    </div>

                    <div class="itme-trust">
                        <a class="" referrerpolicy="origin" target="_blank"
                            href="https://trustseal.enamad.ir/?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT">
                            <img referrerpolicy="origin" src="{{ asset('/site/images/logonama.png') }}" alt=""
                                style="cursor:pointer" id="yECDeYH06VHLxw3VZRBT">
                        </a>
                    </div>
                </div>

                <div class="box-item-trust flex-box">
                    <div class="itme-trust">
                        <a class="" referrerpolicy="origin" target="_blank">
                            <img referrerpolicy="origin" src="{{ asset('/site/images/Shetab-logo-LimooGraphic.png') }}"
                                alt="" style="cursor:pointer" id="yECDeYH06VHLxw3VZRBT">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- <footer class="bg-gray-200 p-8 rounded-2xl mt-8 text-center sm:text-right">
    <div class="grid justify-center justify-items justify-items-center grid-cols-2 lg:flex lg:grid-cols-4 gap-2 my-8">
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-lock w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">حفظ اطلاعات</p>
        </div>
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-support w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">پشتیبانی 24 ساعته</p>
        </div>
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-ticket w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">ضمانت پرداخت</p>
        </div>
        <div class="text-primary text-center sm:min-w-36 sm:max-w-44">
            <i class="icon-bigclock w-12 h-12 flex items-center justify-center mx-auto text-4xl mb-2"></i>
            <p class="font-medium leading-5">ثبت سفارش فوری</p>
        </div>
    </div>
    <p>{!! $footerDescription !!}</p>
    <div class="mt-8 xl:flex xl:justify-between xl:gap-8 xl:mt-10">
        <div class="xl:w-3/12">
            <div class="sm:flex sm:gap-6 xl:block xl:pl-4">
                <div class="sm:w-full">
                    <div class="flex items-center gap-4">
                        <h6 class="font-semibold mb-1 whitespace-nowrap">آدرس:</h6>
                        <hr class="w-full border-gray-400">
                    </div>
                    <p class="text-sm">{{ $address }}</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:w-full xl:mt-4">
                    <div class="flex items-center gap-4">
                        <h6 class="font-semibold mb-1 whitespace-nowrap">ساعات کاری:</h6>
                        <hr class="w-full border-gray-400">
                    </div>
                    <div class="flex items-center justify-between gap-4 md:gap-2">
                        <span class="whitespace-nowrap text-sm">شنبه تا پنج شنبه</span>
                        <hr class="w-full border-gray-400 border-dashed">
                        <span class="whitespace-nowrap text-sm">از ساعت 10 صبح الی 12 بامداد</span>
                    </div>
                    <div class="flex items-center justify-between gap-4 md:gap-2">
                        <span class="whitespace-nowrap text-sm">جمعه</span>
                        <hr class="w-full border-gray-400 border-dashed">
                        <span class="whitespace-nowrap text-sm">15:00 الی 21:00</span>
                    </div>
                </div>
            </div>
            <div class="mt-4 flex">
                <h6 class="font-semibold pl-2 ml-2 border-l-2 border-gray-400">تلفن تماس</h6>
                <div class="grid">
                    <a class="link link-transition font-semibold"
                        href="tel:{{ $phone }}">{{ $phone }}</a>
                </div>
            </div>
        </div>
        <div class="text-center mt-8 xl:mt-0 xl:mb-14 xl:w-6/12">
            <h6 class="font-semibold mb-2">فارس گیمر در شبکه های اجتماعی</h6>
            <div class="flex gap-4 justify-center">
                <a class="w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="{{ $twitter['url'] ?? '' }}">
                    <i
                        class="icon-twitter text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
                <a class="w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="{{ $instagram['url'] ?? '' }}">
                    <i
                        class="icon-instagram text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
                <a class="w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="{{ $telegram['url'] ?? '' }}">
                    <i
                        class="icon-telegram-plane text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
                <a class="discord-link w-12 h-12 2xs:w-16 2xs:h-16 rounded-2xl flex items-center justify-center bg-primary bg-opacity-10 hover:bg-opacity-100 focus:bg-opacity-100 transition-colors duration-200 group"
                    href="https://discord.gg/2kYFXHh3">
                    <i
                        class="icon_discord text-primary group-hover:text-white group-focus:text-white leading-none text-xl 2xs:text-2xl"></i>
                </a>
            </div>
        </div>
        <div class="xl:w-3/12">
            <div class="mt-8 grid justify-center xl:justify-end xl:mt-0">
                <h6 class="font-semibold text-center xl:text-center">نماد اعتماد</h6>
                <div class="flex new_mt">
                    <div class="trust_symbol">
                        <a referrerpolicy="origin" target="_blank"
                            href="https://trustseal.enamad.ir/?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT"><img
                                referrerpolicy="origin"
                                src="https://Trustseal.eNamad.ir/logo.aspx?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT"
                                alt="" style="cursor:pointer" id="yECDeYH06VHLxw3VZRBT"></a>

                    </div>


                    <div class="trust_symbol">
                        <img id='nbqergvjoeuksizpjzpesizp' style ='cursor:pointer'
                            onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=238979&p=uiwkxlaomcsipfvljyoepfvl", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                            alt ='logo-samandehi'
                            src='https://logo.samandehi.ir/logo.aspx?id=238979&p=odrfqftiaqgwbsiyyndtbsiy' />
                    </div>
                    <div class="trust_symbol">
                        <a class="" referrerpolicy="origin" target="_blank"
                            href="https://trustseal.enamad.ir/?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT">
                            <img referrerpolicy="origin" src="{{ asset('/site/images/logonama.png') }}"
                                alt="" style="cursor:pointer" id="yECDeYH06VHLxw3VZRBT">
                        </a>
                    </div>


                </div>
                <div class="flex new_mt">


                    <div class="trust_symbol">
                        <a class="" referrerpolicy="origin" target="_blank">
                            <img referrerpolicy="origin"
                                src="{{ asset('/site/images/Shetab-logo-LimooGraphic.png') }}" alt=""
                                style="cursor:pointer" id="yECDeYH06VHLxw3VZRBT">
                        </a>
                    </div>
                    <!-- <div class="trust_symbol">
      <a class="" referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=219672&amp;Code=yECDeYH06VHLxw3VZRBT">
       <style>#zarinpal{margin:auto} #zarinpal img {width: 80px;}</style>
       <div id="zarinpal">
       <script src="https://www.zarinpal.com/webservice/TrustCode" type="text/javascript"></script>
       </div>
      </a>
     </div> -->
                </div>
            </div>
        </div>
</footer> --}}
