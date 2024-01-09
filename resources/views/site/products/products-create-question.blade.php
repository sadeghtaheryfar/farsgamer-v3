<div>
    <form class="comment__form mt-8" wire:submit.prevent="storeQuestion()">
        <div class="comment__form-head">
            <h6 class="comment__form-title">پرسش</h6>
        </div>
        <div class="comment__form-content">
            @guest
                <p>برای ثبت پرسش <a href="{{route('auth')}}"><span class="text-primary font-semibold">وارد</span></a> سایت شوید</p>
            @endguest

            @auth
                <p>شما به عنوان <span class="text-primary font-semibold">{{auth()->user()->username}}</span> سوال خود را می‌نویسید.</p>

                @if (session()->has('product-question-created'))
                    <p class="bg-light-green px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ session('product-question-created') }}</p>
                @endif

                @error('question')
                <p class="bg-pink px-4 py-2 text-center rounded-2xl mt-4 font-medium">{{ $message }}</p>
                @enderror
                <textarea class="text-field w-full mt-4 h-auto resize-y" rows="4" placeholder="سوال خود را بپرسید" wire:model.defer="question"></textarea>
                <button class="comment__form-submit" type="submit">ارسال پرسش</button>
            @endauth
        </div>
    </form>
</div>