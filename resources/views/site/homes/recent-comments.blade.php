<section>
    <div class="flex gap-2 items-center mb-4 mt-8 lg:mb-6 lg:mt-10">
        <i class="icon-comment text-xl"></i>
        <h2 class="font-bold text-lg">نظرات اخیر</h2>
    </div>

    <div class="swiper mySwiper-comment-home">
        <div class="swiper-wrapper">

            @foreach ($recentComments as $comment)
                <div class="swiper-slide swiper-slide-comment-home">
                    <div class="box-comment-slider">
                        <div class="flex-box flex-right">
                            <div class="date-momment-slider flex-box flex-column">
                                <span>{{ jalaliDate($comment->created_at, '%d') }}</span>

                                <span>{{ jalaliDate($comment->created_at, '%B') }}</span>
                            </div>

                            <div>
                                <div class="header-momment-slider">
                                    <span>{{ $comment->user->username }}</span>
                                </div>

                                <div class="flex-box flex-right">
                                    <x-site.rating-star :rating="$comment->rating"/>
                                </div>
                            </div>
                        </div>

                        <div class="message-comment-slider">
                            <span>{{ $comment->comment }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="swiper-pagination swiper-pagination-comment flex-box"></div>
    </div>
</section>
