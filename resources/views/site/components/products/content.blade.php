<div class="box-message-detalist-product hide-item-pc">
    <div class="show-menu-message-detalist-product flex-box">
        <div class="menu-message-detalist-product flex-box">
            <a id="btn-detalist-prudect-page" href="#detalist-prudect-page"
                class="item-menu-message-detalist-product flex-box menu-message-detalist-product-active">
                <span>مشخصات</span>
            </a>

            <a id="btn-comments-prudect-page" href="#comments-prudect-page"
                class="item-menu-message-detalist-product flex-box">
                <span>نظرات</span>
            </a>

            <a id="btn-question-prudect-page" href="#question-prudect-page"
                class="item-menu-message-detalist-product flex-box">
                <span>پرسش و پاسخ</span>
            </a>
        </div>
    </div>

    <div id="detalist-prudect-page"></div>

    <div class="box-table-detalist-product flex-box flex-column">
        {!! $product->description !!}
    </div>

    <div id="comments-prudect-page"></div>

    <div class="box-comments-detalist-product">
        <div class="show-box-comments-detalist-product">
            <div>
                <span>نظرات اخیر</span>
            </div>

            <div>
                @forelse($comments as $comment)
                    @include('site.components.products.comment')
                @empty
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="{{ asset('site/svg/no-comments.svg') }}" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس نظرشو نگفته</p>
                    </div>
                @endforelse
            </div>

            <div>
                {{-- @if (method_exists($comments, 'links'))
                    {{ $comments->links('site.components.load-more') }}
                @endif --}}
            </div>
        </div>
    </div>

    <div id="question-prudect-page"></div>
    <div class="show-box-comments-detalist-product">
        <div>
            <span>پرسش و پاسخ</span>
        </div>


        <div class="box-answer-comments-detalist-product">
            @forelse($questions as $question)
                <livewire:site.products.product-question :product="$product" :question="$question" />
            @empty
                <div class="grid gap-2 justify-center justify-items-center py-4">
                    <img src="{{ asset('site/svg/no-questions.svg') }}" alt="">
                    <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس سوالی نداشته</p>
                </div>
            @endforelse

            {{-- @if (method_exists($questions, 'links'))
                {{ $questions->links('site.components.load-more') }}
            @endif --}}

            <livewire:site.products.product-create-question :product="$product" />
        </div>
    </div>
</div>
