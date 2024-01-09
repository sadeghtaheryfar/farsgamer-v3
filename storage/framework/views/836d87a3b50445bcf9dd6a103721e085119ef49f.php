<div>
    <?php echo $__env->make('site.homes.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.triple-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.best-sellers', ['products' => $bestSellers, 'title' => 'پرفروش‌های فارس گیمر', 'icon' => 'site/svg/fire.svg'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.gift-cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_big_one'])->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.special-discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('site.homes.fortnite', ['products' => $fortnite, 'title' => 'جدید ترین های فورتنایت', 'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="grid gap-4 mt-4 sm:grid-cols-2">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_medium_two','home_medium_three'])->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.gaming-equipment',
        ['products' => $physical,
         'title' => 'محصولات فیزیکی',
          'route' => route('products', ['category'=>'gaming-equipment']),
          'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_big_four'])->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.best-sellers',
        ['products' => $steam,
         'title' => ' بازی های دیگر',
         'route' => route('products'),
          'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.recent-comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




    <?php echo $__env->make('site.homes.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<?php echo $__env->make('site.homes.steam',
			['products' => $steamGames,
			'title' => 'محصولات استیم',
			'route' => route('products', ['category'=>'steam']),
			'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="grid gap-4 mt-4 sm:grid-cols-2 xl:grid-cols-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_small_five','home_small_six','home_small_seven','home_small_eight'])
            ->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['image'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.recent-articles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/homes/home2.blade.php ENDPATH**/ ?>