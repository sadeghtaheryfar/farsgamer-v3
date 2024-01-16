<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main>
    <section class="h-screen flex justify-center items-center p-6 rounded-2xl lg:p-8" style="background:#EDFDFC">
        <div class="text-center w-full">
            <h1 class="text-2xl font-semibold sm:text-4xl">!!!!!!!اممممممم</h1>
            <h2 class="text-lg font-medium sm:text-xl">صفحه مورد نظر شما یافت نشد</h2>
            <img class="max-w-sm mx-auto mt-8 sm:w-1/2" src="<?php echo e(asset('site/svg/404.svg')); ?>" alt="404">
            <a class="btn btn-primary h-12 mt-8" href="<?php echo e(route('home')); ?>">
                <i class="icon-home"></i>
                <span>برگشت به خانه</span>
            </a>
        </div>
    </section>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/errors/404.blade.php ENDPATH**/ ?>