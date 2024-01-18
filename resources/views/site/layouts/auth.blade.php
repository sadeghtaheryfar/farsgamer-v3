<!DOCTYPE html>
<html lang="fa" dir="rtl">

@include('site.components.layouts.head')
<body>
<main style="padding: 2.5rem !important" class="container py-10 grid content-center">
    <section class="grid gap-8 items-center lg:grid-cols-12">
        <img class="rounded-2xl lg:order-2 lg:col-start-5 lg:col-end-13" src="{{asset($background)}}" alt="">
        <div class="grid h-full content-center p-8 shadow-sm rounded-2xl bg-white lg:order-1 lg:col-start-1 lg:col-end-5">
            <a class="inline-flex items-center gap-2 mb-8 link-transition hover:text-primary-deep" href="{{route('home')}}">
                <i class="icon-arrow-right-square"></i>
                <p>بازگشت به خانه</p>
            </a>

            @yield('content')
        </div>
    </section>
</main>

@include('site.components.layouts.foot')
</body>
</html>