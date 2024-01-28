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