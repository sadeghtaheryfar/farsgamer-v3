<section class="posttype-content">

    <ul class="posttype-content__tabs">
        <li easytab-tab class="posttype-content__tab active">
            <a class="posttype-content__tab-link">
                <i class="posttype-content__tab-icon icon-filter"></i>
                <span>توضیحات</span>
            </a>
        </li>
        <li easytab-tab class="posttype-content__tab">
            <a class="posttype-content__tab-link">
                <i class="posttype-content__tab-icon icon-comment"></i>
                <span>نظرات <span class="text-sm">({{$commentsCount}})</span></span>
            </a>
        </li>
        <li easytab-tab class="posttype-content__tab">
            <a class="posttype-content__tab-link">
                <i class="posttype-content__tab-icon icon-question-answer"></i>
                <span>پرسش و پاسخ <span class="text-sm">({{$questionsCount}})</span></span>
            </a>
        </li>
    </ul>

    <div>

        {{-- Description --}}
        <div easytab-content class="active">
            <div class="posttype-content__description">
                {!! $product->description !!}
            </div>
        </div>

        {{-- Comments --}}
        <div easytab-content>
            <div class="posttype-content__comments">
                @forelse($comments as $comment)
                    @include('site.components.products.comment')
                @empty
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="{{asset('site/svg/no-comments.svg')}}" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس نظرشو نگفته</p>
                    </div>
                @endforelse

                    {{-- @if(method_exists($comments, 'links'))
                        {{ $comments->links('site.components.load-more') }}
                    @endif --}}
            </div>
        </div>

        {{-- Questions --}}
        <div easytab-content>
            <div class="posttype-content__question-and-answer">
                @forelse($questions as $question)
                    <livewire:site.products.product-question :product="$product" :question="$question"/>
                @empty
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="{{asset('site/svg/no-questions.svg')}}" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس سوالی نداشته</p>
                    </div>
                @endforelse

                    {{-- @if(method_exists($questions, 'links'))
                        {{ $questions->links('site.components.load-more') }}
                    @endif --}}

                <livewire:site.products.product-create-question :product="$product"/>
            </div>
        </div>
    </div>
</section>