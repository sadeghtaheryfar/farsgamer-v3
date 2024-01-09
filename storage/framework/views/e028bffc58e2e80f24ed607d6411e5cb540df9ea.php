<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<main class="container py-10 grid content-center">
    <section class="grid gap-8 items-center lg:grid-cols-12">
        <img class="rounded-2xl lg:order-2 lg:col-start-5 lg:col-end-13" src="<?php echo e(asset($background)); ?>" alt="">
        <div class="grid h-full content-center p-8 shadow-sm rounded-2xl bg-white lg:order-1 lg:col-start-1 lg:col-end-5">
            <a class="inline-flex items-center gap-2 mb-8 link-transition hover:text-primary-deep" href="<?php echo e(route('home')); ?>">
                <i class="icon-arrow-right-square"></i>
                <p>بازگشت به خانه</p>
            </a>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </section>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/layouts/auth.blade.php ENDPATH**/ ?>