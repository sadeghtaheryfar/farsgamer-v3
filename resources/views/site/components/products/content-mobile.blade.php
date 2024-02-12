<section class="box-detalist-mobile hide-item-mobile">
    <div class="show-box-detalist-mobile">
        <div class="header-box-detalist-mobile flex-box flex-justify-space">
            <div>
                <span>توضیحات</span>
            </div>

            <a class="flex-box" data-bs-toggle="modal" data-bs-target="#modal-detalist-prudect">
                <span>دیدن همه توضیحات</span>

                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                        stroke="#3D42DF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="message-box-detalist-mobile">
            {!! $product->description !!}
        </div>

        <!-- Modal ...................................................................................   -->
        <div class="modal fade" id="modal-detalist-prudect" tabindex="-1" aria-labelledby="modal-request"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header flex-box flex-justify-space">
                        <div class="header-modal-dashboard flex-box flex-column flex-aling-auto">
                            <span class="modal-title" id="exampleModalLabel">توضیحات</span>
                        </div>

                        <svg class="cursor-pointer add-red-big" data-bs-dismiss="modal" aria-label="Close"
                            width="58" height="58" viewBox="0 0 58 58" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.834 35.6863L36.1085 21.4118" stroke="#FF3838" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M36.1085 35.6863L21.834 21.4118" stroke="#FF3838" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="modal-body">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="box-detalist-mobile hide-item-mobile">
    <div class="show-box-detalist-mobile">
        <div class="header-box-detalist-mobile flex-box flex-justify-space">
            <div>
                <span>نظرات</span>
            </div>

            <a class="flex-box" data-bs-toggle="modal" data-bs-target="#modal-comments-prudect">
                <span>دیدن همه نظرات</span>

                <svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                        stroke="#3D42DF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="message-box-detalist-mobile">
            @forelse($comments as $comment)
                @include('site.components.products.comment')
            @empty
                <div class="grid gap-2 justify-center justify-items-center py-4">
                    <img src="{{ asset('site/svg/no-comments.svg') }}" alt="">
                    <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس نظرشو نگفته</p>
                </div>
            @endforelse
        </div>

        <!-- Modal ...................................................................................   -->
        <div class="modal fade" id="modal-comments-prudect" tabindex="-1" aria-labelledby="modal-request"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header flex-box flex-justify-space">
                        <div class="header-modal-dashboard flex-box flex-column flex-aling-auto">
                            <span class="modal-title" id="exampleModalLabel">توضیحات</span>
                        </div>

                        <svg class="cursor-pointer add-red-big" data-bs-dismiss="modal" aria-label="Close"
                            width="58" height="58" viewBox="0 0 58 58" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.834 35.6863L36.1085 21.4118" stroke="#FF3838" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M36.1085 35.6863L21.834 21.4118" stroke="#FF3838" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="modal-body modal-body-comment">
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
            </div>
        </div>
    </div>
</section>

<section class="box-detalist-mobile hide-item-mobile">
    <div class="show-box-detalist-mobile">
        <div class="header-box-detalist-mobile flex-box flex-justify-space">
            <div>
                <span>پرسش و پاسخ</span>
            </div>

            <a class="flex-box" data-bs-toggle="modal" data-bs-target="#modal-question-prudect">
                <span>دیدن همه پرسش و پاسخ</span>

                <svg width="9" height="18" viewBox="0 0 9 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.99984 16.9201L1.47984 10.4001C0.709844 9.63008 0.709844 8.37008 1.47984 7.60008L7.99984 1.08008"
                        stroke="#3D42DF" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>

        <div class="message-box-detalist-mobile">
            <div>
                @forelse($questions as $question)
                    <livewire:site.products.product-question :product="$product" :question="$question" />
                @empty
                    <div class="grid gap-2 justify-center justify-items-center py-4">
                        <img src="{{ asset('site/svg/no-questions.svg') }}" alt="">
                        <p class="font-bold md:text-md lg:text-2xl text-red">هیچکس سوالی نداشته</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal ...................................................................................   -->
        <div class="modal fade" id="modal-question-prudect" tabindex="-1" aria-labelledby="modal-request"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header flex-box flex-justify-space">
                        <div class="header-modal-dashboard flex-box flex-column flex-aling-auto">
                            <span class="modal-title" id="exampleModalLabel">توضیحات</span>
                        </div>

                        <svg class="cursor-pointer add-red-big" data-bs-dismiss="modal" aria-label="Close"
                            width="58" height="58" viewBox="0 0 58 58" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.834 35.6863L36.1085 21.4118" stroke="#FF3838" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M36.1085 35.6863L21.834 21.4118" stroke="#FF3838" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>

                    <div class="modal-body modal-body-comment">
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
        </div>

        <div class="modal fade" id="modal-answer-question-prudect" tabindex="-1" aria-labelledby="modal-request"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header flex-box flex-justify-space">
                        <div class="header-modal-dashboard flex-box flex-column flex-aling-auto">
                            <span class="modal-title" id="exampleModalLabel">سوال خود را مطرح کنید</span>
                        </div>

                        <img class="cursor-pointer add-red-big" src="img/add-red-big.svg" alt=""
                            data-bs-dismiss="modal" aria-label="Close">
                    </div>

                    <form>
                        <div class="modal-body modal-body-comment">
                            <textarea class="text-modal-dashboard margin-vetical-1" placeholder="سوال خود را وارد نمایید"></textarea>
                        </div>

                        <div class="footer-modal-prudect">
                            <input class="input-submit-style" type="submit" value="ثبت نظر">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
