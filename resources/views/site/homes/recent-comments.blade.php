<section>
    <div class="flex gap-2 items-center mb-4 mt-8 lg:mb-6 lg:mt-10">
        <i class="icon-comment text-xl"></i>
        <h2 class="font-bold text-lg">نظرات اخیر</h2>
    </div>
    <div class="review-slider swiper-container relative pb-8">
        <div class="swiper-wrapper">
            @foreach($recentComments as $comment)
                <div class="swiper-slide">
                    <div class="comment bg-white">
                        <div class="comment__head">
                            <div class="comment__info">
                                <div class="comment__date">
                                    <span class="comment__date-day">{{jalaliDate($comment->created_at, '%d')}}</span>
                                    <span class="comment__date-month">{{jalaliDate($comment->created_at, '%B')}}</span>
                                </div>
                                <div class="comment__user">
                                    <span class="comment__user-name">{{$comment->user->username}}</span>
                                    <x-site.rating-star :rating="$comment->rating"/>
                                </div>
                            </div>
                        </div>
						<!-- <div class="comment__message new_comment">{{$comment->commentable->title ?? ''}}</div> -->
                        <div class="comment__body">
                            <div class="comment__content">
                                <div class="comment__content-icon">
                                    <i class="icon-quote"></i>
                                </div>
                                <p class="comment__message">{{$comment->comment}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination bottom-0"></div>
    </div>
</section>