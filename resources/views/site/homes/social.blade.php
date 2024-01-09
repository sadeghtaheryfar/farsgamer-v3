<section class="mt-10 bg-white rounded-2xl p-6 2md:flex 2md:gap-8 items-center justify-center">
    <div class="2md:w-1/2">
        <img class="w-48 mx-auto sm:w-full sm:max-w-72" src="{{asset('site/svg/social-media-man.svg')}}" alt="">
    </div>
    <div class="mt-4 2md:w-1/2 2md:mt-0 text-center">
        <h3 class="mx-auto text-xl font-semibold mb-8">مارا در شبکه های اجتماعی دنبال کنید</h3>
        <div class="grid gap-2 justify-center">
            <a href="{{$telegram['url'] ?? ''}}" class="flex transform hover:scale-95 focus:scale-95 transition duration-200">
                <img class="max-w-72 mx-auto" src="{{asset($telegram['image'] ?? '')}}" alt="">
            </a>
            <a href="{{$instagram['url'] ?? ''}}" class="flex transform hover:scale-95 focus:scale-95 transition duration-200">
                <img class="max-w-72 mx-auto" src="{{asset($instagram['image'] ?? '')}}" alt="">
            </a>
        </div>
    </div>
</section>