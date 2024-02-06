<section id="slider-page-articles">
    <div class="swiper mySwiper-page-articles flex-box">
        <div class="swiper-wrapper">
            @foreach ($LastArticles as $key => $slider)
                <div class="swiper-slide swiper-slide-page-articles">
                    <div class="box-right-slide-page-articles flex-box flex-column">
                        <div class="flex-box flex-justify-space width-max">
                            <div class="header-slide-page-articles">
                                <span>مقالات اخیر</span>
                            </div>

                            <div class="flex-box flex-column flex-aling-left">
                                <div dir="ltr" class="number-articles-item-slider">
                                    <span>0{{ ++$key }}</span>

                                    <span>/</span>

                                    <span>05</span>
                                </div>

                                <div class="date-articles-item-slider flex-box flex-right">
                                    <span>{{ jalaliDate($slider->created_at, '%d %B %Y') }}</span>

                                    <div class="circle-date-articles-item"></div>

                                    <span>{{ !empty($slider->categories->title) ? $slider->categories->title : 'بدون دسته بندی' }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="message-header-slide-page-articles">
                            <span>{{ $slider->title }}</span>
                        </div>

                        <div class="message-slide-page-articles">
                            {!! $slider->description !!}
                        </div>

                        <div class="flex-box flex-right width-max" style="margin-top: auto">
                            <a href="{{ route('articles.show', $slider->slug) }}" class="btn-more-page-articles">
                                <span>مطالعه بیشتر</span>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-pagination swiper-pagination-page-articles flex-box"></div>

                    <div class="box-left-slide-page-articles">
                        <img src="{{ asset($slider->image) }}" alt="">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-button-next swiper-button-next-page-articles"></div>

        <div class="swiper-button-prev swiper-button-prev-page-articles"></div>

        {{-- <div class="swiper-pagination swiper-pagination-page-articles flex-box"></div> --}}
    </div>
</section>

<section class="main-style-page">
    <div class="header-page-articles flex-box flex-justify-space">
        <div>
            <span>مقالات</span>
        </div>

        <div class="select-box">
            <div class="header-select-box flex-box flex-justify-space">
                <img src="img/sort.svg" alt="">

                <span id="text-header-select-box"></span>

                <img class="icon-select-box" src="img/arrow-square-up.svg" alt="">
            </div>

            <div class="more-select-box hide-item">
                <ul>
                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 1</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 2</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 3</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 4</span>
                    </li>

                    <li class="item-more-select-box">
                        <span class="text-item-more-select-box">تست 5</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="box-item-articles-page" class="flex-box flex-wrap flex-right">
        @foreach ($articles as $article)
            <div class="item-page-articles">
                <a href="{{ route('articles.show', $article->slug) }}">
                    <div class="show-articles-page">
                        <div class="img-show-articles">
                            <img src="{{ asset($article->image) }}" alt="">

                            <div class="box-category-item">
                                <span>{{ !empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی' }}</span>
                            </div>
                        </div>

                        <div class="date-articles-item flex-box flex-right">
                            <span>{{ jalaliDate($article->created_at, '%d %B %Y') }}</span>

                            <div class="circle-date-articles-item"></div>

                            <span>مدیریت فارس گیمر</span>
                        </div>

                        <div class="header-articles-item">
                            <span>{{ $article->title }}</span>
                        </div>

                        <div class="detalist-articles-item">
                            {!! $article->description !!}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div id="box-item-articles-page-mobile" class="flex-box flex-wrap flex-right">
        @foreach ($articles as $article)
            <div class="item-page-articles-mo">
                <a href="{{ route('articles.show', $article->slug) }}">
                    <div class="show-articles-page-mo">
                        <div class="flex-box">
                            <div class="img-show-articles-mo">
                                <img src="{{ asset($article->image) }}" alt="">
                            </div>

                            <div class="width-max">
                                <div class="flex-box flex-justify-space">
                                    <div class="date-articles-item flex-box flex-right">
                                        <span>{{jalaliDate($article->created_at, '%d %B %Y')}}</span>

                                        <div class="circle-date-articles-item"></div>

                                        <span>مدیریت فارس گیمر</span>
                                    </div>

                                    <div class="box-category-item-mo">
                                        <span>{{ !empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی' }}</span>
                                    </div>
                                </div>

                                <div class="header-articles-item">
                                    <span>{{ $article->title }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="detalist-articles-item">
                            {!! $article->description !!}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>


    <div class="mt-4">
        {{ $articles->links('site.components.pagination') }}
    </div>
</section>


