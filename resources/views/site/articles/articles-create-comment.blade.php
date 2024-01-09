<div>
    <form class="comment__form mt-8" wire:submit.prevent="store()">
        <div class="comment__form-head">
            <h6 class="comment__form-title">نظرات</h6>
        </div>
        <div class="comment__form-content">
            @guest
                <p>برای ثبت نظر <a href="{{route('auth')}}"><span class="text-primary font-semibold">وارد</span></a> سایت شوید</p>
            @endguest

            @auth
                <p>شما به عنوان <span class="text-primary font-semibold">{{auth()->user()->username}}</span> نظر خود را می‌نویسید.</p>

                @if (session()->has('article-comment-created'))
                    <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ session('article-comment-created') }}</p>
                @endif

                @error('comment')
                <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
                @enderror

                <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="نظر خود را بنوسید" wire:model.defer="comment"></textarea>
                <button class="comment__form-submit" type="submit">ارسال نظر</button>
            @endauth
        </div>
    </form>
</div>