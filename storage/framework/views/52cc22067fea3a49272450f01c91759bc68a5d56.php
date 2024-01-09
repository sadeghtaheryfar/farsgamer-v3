<div>
    <?php echo $__env->make('site.homes.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.triple-item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.best-sellers', ['products' => $bestSellers, 'title' => 'پرفروش‌های فارس گیمر', 'icon' => 'site/svg/fire.svg'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.gift-cards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_big_one'])->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['url'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.special-discount', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('site.homes.best-sellers', ['products' => $fortnite, 'title' => 'محصولات فورتنایت', 'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_medium_two','home_medium_three'])->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['url'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.best-sellers', ['products' => $physical, 'title' => 'محصولات فیزیکی', 'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_big_four'])->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['url'])); ?>" alt=""></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <?php echo $__env->make('site.homes.best-sellers', ['products' => $steam, 'title' => 'محصولات استیم', 'icon' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.recent-comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site.homes.social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="mt-4">
        <?php $__currentLoopData = \App\Models\Setting::whereIn('name', ['home_small_five','home_small_six','home_small_seven','home_small_eight'])
            ->get()->pluck('value', 'id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($banner['url']); ?>" class="flex"><img class="w-full rounded-lg" src="<?php echo e(asset($banner['url'])); ?>" alt=""></a>
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
<?php $__env->stopPush(); ?><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/home.blade.php ENDPATH**/ ?>