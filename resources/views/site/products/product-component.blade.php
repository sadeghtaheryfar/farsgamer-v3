<div>
    {{ Breadcrumbs::view('site.components.breadcrumb', 'products.show', $product) }}

    <section id="main-product" class="flex-box flex-justify-space flex-aling-auto">
        <section class="right-main-product">
            <div class="box-header-detalist-product flex-box flex-justify-space flex-aling-auto flex-column-1000">
                @include('site.components.products.image-gallery')

                <div class="margin-horizontal-1"></div>

                @include('site.components.products.info')
            </div>

            <section id="left-main-product-tablet" class="left-main-product">
                <div class="box-form-product">
                    @include('site.components.products.form')
                </div>

                <div class="box-trainings-product">
                    <div class="show-box-trainings-product">
                        <span>آموزش های مورد نیاز</span>

                        <div class="flex-box flex-wrap flex-right">
                            <a href="#" class="item-trainings-product">
                                <span>راهنمای انتخاب نوع اکانت</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span>لینک کردن Ps4 به اپیک گیمز</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span> راهنمای دومرحله ای پلی استیشن</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span>راهنمای انتخاب نوع اکانت</span>
                            </a>

                            <a href="#" class="item-trainings-product">
                                <span>لینک کردن Ps4 به اپیک گیمز</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            @include('site.components.products.content')
        </section>

        <section class="left-main-product">
            <div class="box-form-product">
                @include('site.components.products.form')
            </div>

            <div class="box-trainings-product">
                <span>آموزش های مورد نیاز</span>

                <div class="flex-box flex-wrap flex-right">
                    <a href="#" class="item-trainings-product">
                        <span>راهنمای انتخاب نوع اکانت</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span>لینک کردن Ps4 به اپیک گیمز</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span> راهنمای دومرحله ای پلی استیشن</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span>راهنمای انتخاب نوع اکانت</span>
                    </a>

                    <a href="#" class="item-trainings-product">
                        <span>لینک کردن Ps4 به اپیک گیمز</span>
                    </a>
                </div>
            </div>
        </section>
    </section>

    <div class="margin-vetical-2"></div>

    <section class="margin-vetical-2 hide-item-mobile">
        <div class="flex-box flex-justify-space margin-vetical-1 margin-top-3">
            <div class="text-header-sec flex-box">
                <span>محصولات مشابه</span>
            </div>

            <a href="search.html" class="btn-more-sec flex-box color-blue">
                <span>مشاهده بیشتر</span>

                <img src="img/Vector-dark.svg" alt="">
            </a>
        </div>

        <div class="slider-prudect">
            <div class="swiper slider-main-prudect">
                <div class="swiper-wrapper">
                    <!-- <div class="swiper-slide">
                    <div class="swiper-slide-prudect flex-box flex-column flex-justify-space width-max">
                        <a href="products.html" class="width-max">
                            <div class="img-slider-prudect width-max">
                                <img src="img/img-prudect.jpg" alt="">
                            </div>

                            <div class="name-slider-prudect">
                                <span>گیفت کارت 10 دلاری psn آمریکا</span>
                            </div>
                        </a>

                        <div class="width-max">
                            <div class="category-slider-prudect">
                                <span>محصول فورتنایت</span>
                            </div>

                            <div class="flex-box">
                                <div class="price-slider-prudect flex-box flex-column">
                                    <div>
                                        <span>49,000</span>

                                        <span>تومان</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-btn-slider-prudect flex-box">
                                <a href="products.html" class="btn-slider-prudect flex-box">
                                    <img src="img/shopping-cart -blue.svg" alt="">

                                    <span>جزئیات محصول</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="swiper-slide-prudect flex-box flex-column flex-justify-space width-max">
                        <a href="products.html" class="width-max">
                            <div class="img-slider-prudect width-max">
                                <img src="img/img-prudect.jpg" alt="">
                            </div>

                            <div class="name-slider-prudect">
                                <span>گیفت کارت 10 دلاری psn آمریکا</span>
                            </div>
                        </a>

                        <div class="width-max">
                            <div class="category-slider-prudect">
                                <span>محصول فورتنایت</span>
                            </div>

                            <div class="flex-box">
                                <div class="price-slider-prudect flex-box flex-column">
                                    <div>
                                        <span>49,000</span>

                                        <span>تومان</span>
                                    </div>

                                    <div class="off-slider-prudect">
                                        <span>54,000</span>

                                        <span>9%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-btn-slider-prudect flex-box">
                                <a href="products.html" class="btn-slider-prudect flex-box">
                                    <img src="img/shopping-cart -blue.svg" alt="">

                                    <span>جزئیات محصول</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="swiper-slide-prudect flex-box flex-column flex-justify-space width-max">
                        <a href="products.html" class="width-max">
                            <div class="img-slider-prudect width-max">
                                <img src="img/img-prudect.jpg" alt="">
                            </div>

                            <div class="name-slider-prudect">
                                <span>گیفت کارت 10 دلاری psn آمریکا</span>
                            </div>
                        </a>

                        <div class="width-max">
                            <div class="category-slider-prudect">
                                <span>محصول فورتنایت</span>
                            </div>

                            <div class="flex-box">
                                <div class="price-slider-prudect flex-box flex-column">
                                    <div>
                                        <span>49,000</span>

                                        <span>تومان</span>
                                    </div>

                                    <div class="off-slider-prudect">
                                        <span>54,000</span>

                                        <span>9%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-btn-slider-prudect flex-box">
                                <a href="products.html" class="btn-slider-prudect flex-box">
                                    <img src="img/shopping-cart -blue.svg" alt="">

                                    <span>جزئیات محصول</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="swiper-slide-prudect flex-box flex-column flex-justify-space width-max">
                        <a href="products.html" class="width-max">
                            <div class="img-slider-prudect width-max">
                                <img src="img/img-prudect.jpg" alt="">
                            </div>

                            <div class="name-slider-prudect">
                                <span>گیفت کارت 10 دلاری psn آمریکا</span>
                            </div>
                        </a>

                        <div class="width-max">
                            <div class="category-slider-prudect">
                                <span>محصول فورتنایت</span>
                            </div>

                            <div class="flex-box">
                                <div class="price-slider-prudect flex-box flex-column">
                                    <div>
                                        <span>49,000</span>

                                        <span>تومان</span>
                                    </div>

                                    <div class="off-slider-prudect">
                                        <span>54,000</span>

                                        <span>9%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-btn-slider-prudect flex-box">
                                <a href="products.html" class="btn-slider-prudect flex-box">
                                    <img src="img/shopping-cart -blue.svg" alt="">

                                    <span>جزئیات محصول</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="swiper-slide-prudect flex-box flex-column flex-justify-space width-max">
                        <a href="products.html" class="width-max">
                            <div class="img-slider-prudect width-max">
                                <img src="img/img-prudect.jpg" alt="">
                            </div>

                            <div class="name-slider-prudect">
                                <span>گیفت کارت 10 دلاری psn آمریکا</span>
                            </div>
                        </a>

                        <div class="width-max">
                            <div class="category-slider-prudect">
                                <span>محصول فورتنایت</span>
                            </div>

                            <div class="flex-box">
                                <div class="price-slider-prudect flex-box flex-column">
                                    <div>
                                        <span>49,000</span>

                                        <span>تومان</span>
                                    </div>

                                    <div class="off-slider-prudect">
                                        <span>54,000</span>

                                        <span>9%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="box-btn-slider-prudect flex-box">
                                <a href="products.html" class="btn-slider-prudect flex-box">
                                    <img src="img/shopping-cart -blue.svg" alt="">

                                    <span>جزئیات محصول</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen1</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen2</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen3</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen4</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen5</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen6</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide-prudect-box-new">
                        <div
                            class="swiper-slide-prudect swiper-slide-prudect-new flex-box flex-column flex-justify-space width-max">
                            <a class="show-swiper-slide-prudect flex-box flex-column" href="products.html">
                                <div>
                                    <img src="img/img-prudect.jpg" alt="">
                                </div>

                                <div>
                                    <span>Harlly queen7</span>
                                </div>

                                <div>
                                    <span>180،000</span>

                                    <span>تومان</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next swiper-button-next-prudect"></div>

                <div class="swiper-button-prev swiper-button-prev-prudect"></div>

                <div class="swiper-pagination swiper-pagination-prudect flex-box"></div>
            </div>
        </div>
    </section>

    @include('site.components.products.content-mobile')
</div>
