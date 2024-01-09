<div>
    @include('site.homes.slider')
    @include('site.homes.triple-item')
    @include('site.homes.best-sellers', ['products' => $bestSellers, 'title' => 'پرفروش‌های فارس گیمر', 'icon' => 'site/svg/fire.svg'])
    @include('site.homes.gift-cards')

    <section class="mt-4">
        @foreach(\App\Models\Setting::whereIn('name', ['home_big_one'])->get()->pluck('value', 'id') as $banner)
            <a href="{{$banner['url']}}" class="flex"><img class="w-full rounded-lg" src="{{asset($banner['image'])}}" alt=""></a>
        @endforeach
    </section>

    @include('site.homes.special-discount')

    @include('site.homes.fortnite', ['products' => $fortnite, 'title' => 'جدید ترین های فورتنایت', 'icon' => ''])

    <section class="grid gap-4 mt-4 sm:grid-cols-2">
        @foreach(\App\Models\Setting::whereIn('name', ['home_medium_two','home_medium_three'])->get()->pluck('value', 'id') as $banner)
            <a href="{{$banner['url']}}" class="flex"><img class="w-full rounded-lg" src="{{asset($banner['image'])}}" alt=""></a>
        @endforeach
    </section>

    @include('site.homes.gaming-equipment',
        ['products' => $physical,
         'title' => 'محصولات فیزیکی',
          'route' => route('products', ['category'=>'gaming-equipment']),
          'icon' => ''])

    <section class="mt-4">
        @foreach(\App\Models\Setting::whereIn('name', ['home_big_four'])->get()->pluck('value', 'id') as $banner)
            <a href="{{$banner['url']}}" class="flex"><img class="w-full rounded-lg" src="{{asset($banner['image'])}}" alt=""></a>
        @endforeach
    </section>

    @include('site.homes.best-sellers',
        ['products' => $steam,
         'title' => ' بازی های دیگر',
         'route' => route('products'),
          'icon' => ''])
    @include('site.homes.recent-comments')




    @include('site.homes.social')


	@include('site.homes.steam',
			['products' => $steamGames,
			'title' => 'محصولات استیم',
			'route' => route('products', ['category'=>'steam']),
			'icon' => ''])

    <section class="grid gap-4 mt-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach(\App\Models\Setting::whereIn('name', ['home_small_five','home_small_six','home_small_seven','home_small_eight'])
            ->get()->pluck('value', 'id') as $banner)
            <a href="{{$banner['url']}}" class="flex"><img class="w-full rounded-lg" src="{{asset($banner['image'])}}" alt=""></a>
        @endforeach
    </section>

    @include('site.homes.recent-articles')
</div>
@push('scripts')
    <script>
        $('[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%H:%M:%S'));
            });
        });

        $('[data-countdown-hour]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown-hour');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%H'));
            });
        });

        $('[data-countdown-minute]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown-minute');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%M'));
            });
        });

        $('[data-countdown-seconds]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown-seconds');
            $this.countdown(finalDate, function (event) {
                $this.html(event.strftime('%S'));
            });
        });
    </script>
@endpush