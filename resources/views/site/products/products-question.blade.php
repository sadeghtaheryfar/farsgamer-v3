<div>
    <div class="comment comment--reply">
        <div class="comment__head">
            <div class="comment__info">
                <div class="comment__date">
                    <span class="comment__date-day">{{jalaliDate($question->created_at, '%d')}}</span>
                    <span class="comment__date-month">{{jalaliDate($question->created_at, '%B')}}</span>
                </div>
                <div class="comment__user">
                    <span class="comment__user-name">{{$question->user->username}}</span>
                </div>
            </div>
        </div>
        <div class="comment__body">
            <div class="comment__content" x-data="{open: false}">
                <div class="comment__content-icon">
                    <i class="icon-quote"></i>
                </div>
                <p class="comment__message">{{$question->text}}</p>
                <button class="comment__reply-btn" @click="open = !open">پاسخ به پرسش</button>
                <form class="comment__form mt-4" x-show="open" wire:submit.prevent="storeAnswer()">
                    @guest
                        <p class="comment__form-content">برای ثبت پاسخ <a href="{{route('auth')}}"><span class="text-primary font-semibold">وارد</span></a> سایت شوید</p>
                    @endguest

                    @auth
                        <div class="comment__form-head">
                            <h6 class="comment__form-title">شما به عنوان <span class="text-primary font-semibold">{{auth()->user()->username}}</span> به این سوال پاسخ
                                میدهید.
                            </h6>
                        </div>
                        <div class="comment__form-content">
                            @if (session()->has('product-answer-created'))
                                <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ session('product-answer-created') }}</p>
                            @endif

                            @error('answer')
                            <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
                            @enderror
                            <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="پاسخ خود را بنویسید" wire:model.defer="answer"></textarea>
                            <button class="comment__form-submit" type="submit">ارسال پاسخ</button>
                        </div>
                    @endauth
                </form>
            </div>
            @foreach($answers as $answer)
                <div class="comment">
                    <div class="comment__head">
                        <div class="comment__info">
                            <div class="comment__user">
                                <span class="comment__user-name">{{$answer->user->username}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="comment__body">
                        <div class="comment__content">
                            <div class="comment__content-icon">
                                <i class="icon-question"></i>
                            </div>
                            <p class="comment__message">{{$answer->text}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>