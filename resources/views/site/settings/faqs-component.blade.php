<section class="main-style-page">
    <div class="header-page-faq">
        <span>دسته بندی ها</span>
    </div>

    <div id="box-category-faq" class="flex-box flex-wrap flex-right">
        @foreach ($faqs as $category => $faq)
            <div class="item-category-faq">
                <a href="{{ route('faq') }}#{{ $category }}">
                    <div class="show-item-category-faq">
                        <div class="img-item-category-faq">
                            <img src="{{ asset($images[$i++]) }}" alt="{{ $category }}">
                        </div>

                        <div class="header-item-category-faq">
                            <span>{{ $category }}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @foreach ($faqs as $category => $faq)
        <div id="{{ $category }}" class="box-acaredon-faq">
            <div class="header-acaredon-box-faq">
                <span>{{ $category }}</span>
            </div>

			@foreach ($faq as $question)
            <div class="box-acaredon-faq">
                <div class="toggle-box-acaredon-faq width-max">
                    <div class="box-header-acaredon-faq width-max flex-box flex-justify-space">
                        <div class="header-acaredon-faq">
                            <span>{{ $question['question'] }}</span>
                        </div>

                        <div>
                            <div class="box-icon-acaredon-faq">
                                <img class="icon-open-faq-massage" src="{{ asset("site-v2/img/arrow-square-up.svg") }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-acaredon-faq-massage hide-acardeon">
                    <div class="box-bottom-faq-massage">
                        <div class="box-massage-faq-massage">
                            {!! $question['answer'] !!}
                        </div>
                    </div>
                </div>
            </div>
			@endforeach
        </div>
    @endforeach
</section>

{{-- <div class="relative p-8 mt-8 bg-white rounded-2xl overflow-hidden md:mt-0">
    <div class="container px-0 max-w-5xl">
        <img class="absolute top-0 left-0 max-w-xl opacity-80" src="{{ asset('site/svg/wave.svg') }}">
        <img class="absolute bottom-0 right-0 max-w-64 lg:max-w-xs"
            src="{{ asset('site/svg/circle-in-circle-5.svg') }}">

        <div class="pt-8 pb-20">
            <h2 class="text-lg font-semibold text-center mb-8">سوالات متداول</h2>
            <ol class="relative grid gap-4 grid-cols-1 xs:grid-cols-2 md:grid-cols-3 p-5">
                @foreach ($faqs as $category => $faq)
                    <li>
                        <a class="grid gap-9 text-center p-4 pb-11 bg-gray-100 rounded-2xl transition duration-200 hover:bg-gray-200 focus:bg-gray-200"
                            href="{{ route('faq') }}#{{ $category }}" title="برای دیدن سوالات کلیک کنید">
                            <img class="rounded-2xl w-full height-150" src="{{ asset($images[$i++]) }}"
                                alt="{{ $category }}">
                            <h2 class="font-bold mt-3">{{ $category }}</h2>
                        </a>
                    </li>
                @endforeach
            </ol>



            <ol class="relative grid gap-12 mt-20">
                @foreach ($faqs as $category => $faq)
                    <li id="{{ $category }}" class="accordion accordion--group">
                        <div class="accordion__group-header">
                            <p class="accordion__group-header-title">{{ $category }}</p>
                        </div>
                        <div class="accordion-list" style="width: 100%">
                            @foreach ($faq as $question)
                                <div class="accordion-item" x-data="{ open: false }">
                                    <h2 class="accordion-header" @click="open = !open">
                                        <button type="button" class="accordion-button"
                                            x-bind:class="{ 'collapsed': !open }">
                                            {{ $question['question'] }}
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" x-bind:class="{ 'show': open }">
                                        <div class="accordion-body">{!! $question['answer'] !!}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</div> --}}
