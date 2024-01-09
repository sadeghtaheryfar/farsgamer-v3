@include('site.components.layouts.head')

<main>
    <section class="h-screen flex justify-center items-center p-6 rounded-2xl lg:p-8" style="background:#EDFDFC">
        <div class="text-center w-full">
            <h1 class="text-2xl font-semibold sm:text-4xl">بزودی برمیگردیم</h1>
            <h2 class="text-lg font-medium sm:text-xl">در حال بروزرسانی سایت هستیم. لطفا تا بروزرسانی کامل سایت صبور باشید و به ما سر بزنید.</h2>
            <img class="max-w-sm mx-auto mt-8 sm:w-1/2" src="{{asset('site/svg/503.svg')}}" alt="404">
            <a class="btn btn-primary h-12 mt-8" href="{{route('home')}}">
                <i class="icon-home"></i>
                <span>برگشت به خانه</span>
            </a>
        </div>
    </section>
</main>

@include('site.components.layouts.foot')
