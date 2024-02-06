<section class="section-home mt-8">
    <section id="show-articles-home">
        <div class="flex-box flex-justify-space margin-vetical-1">
            <div class="text-header-sec flex-box">
                <span>آخرین مقالات</span>
            </div>


            <a href="{{ route('articles') }}" class="btn-more-sec flex-box color-blue">
                <span>مشاهده بیشتر مقالات</span>

                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                        stroke="#3D42DF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="flex-box flex-justify-space flex-wrap">
            @foreach ($articles as $article)
                <div class="item-articles">
                    <a href="{{ route('articles.show', $article->slug) }}">
                        <img class="img-item-articles" src="{{ asset($article->image) }}" alt="">

                        <div class="box-message-articles">
                            <div class="name-item-articles">
                                <span>{{ !empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی' }}</span>
                            </div>

                            <div class="message-item-articles">
                                <p>{{ $article->title }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
</section>


{{-- <section>
    <div class="flex items-center justify-between mb-4 mt-8 lg:mb-6 lg:mt-10">
        <div class="flex gap-2 items-center mb-4 mt-8">
            <i class="icon-articles text-xl"></i>
            <h2 class="font-bold text-lg">پست آموزشی</h2>
        </div>
        <a class="flex gap-2 items-center" href="{{ route('articles') }}">
            <span class="text-sm lg:text-base">مشاهده همه</span>
            <i class="icon-angle-left text-xl"></i>
        </a>
    </div>


    <!-- Swiper -->
    <div class="post-slider swiper-container relative pb-8">
        <div class="swiper-wrapper">
            @foreach ($articles as $article)
                <div class="swiper-slide">
                    <a class="post-box post-box--slide" href="{{ route('articles.show', $article->slug) }}">
                        <img class="post-box__image" src="{{ asset($article->image) }}" alt="">
                        <div class="post-box__content">
                            <h3 class="post-box__title">{{ $article->title }}</h3>
                            <h5 class="post-box__cat">
                                {{ !empty($article->categories->title) ? $article->categories->title : 'بدون دسته بندی' }}
                            </h5>
                            <div class="post-box__btn">مشاهده</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Slider Pagination -->
        <div class="swiper-pagination bottom-0"></div>
    </div>
</section> --}}
