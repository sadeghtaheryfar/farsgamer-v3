<div class="comment">
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
    <div class="comment__body">
        <div class="comment__content">
            <div class="comment__content-icon">
                <i class="icon-quote"></i>
            </div>
            <p class="comment__message">{{$comment->comment}}</p>
        </div>

        {{--answer--}}
        @if($comment->answer)
            <div class="comment">
                <div class="comment__head">
                    <div class="comment__info">
                        <i class="icon-user min-w-12 min-h-12 max-w-12 max-h-12 bg-yellow rounded-xl flex items-center justify-center text-white"></i>
                        <div class="comment__user">
                            <span class="comment__user-name">مدیریت فارس گیمر</span>
                        </div>
                    </div>
                </div>
                <div class="comment__body">
                    <div class="comment__content">
                        <div class="comment__content-icon">
                            <i class="icon-quote"></i>
                        </div>
                        <p class="comment__message">{{$comment->answer}}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>