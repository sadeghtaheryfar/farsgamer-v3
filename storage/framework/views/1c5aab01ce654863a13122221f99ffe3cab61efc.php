<section class="mt-10 bg-white rounded-2xl p-6 2md:flex 2md:gap-8 items-center justify-center">
    <div class="2md:w-1/2">
        <img class="w-48 mx-auto sm:w-full sm:max-w-72" src="<?php echo e(asset('site/svg/social-media-man.svg')); ?>" alt="">
    </div>
    <div class="mt-4 2md:w-1/2 2md:mt-0 text-center">
        <h3 class="mx-auto text-xl font-semibold mb-8">مارا در شبکه های اجتماعی دنبال کنید</h3>
        <a href="<?php echo e($telegram['url'] ?? ''); ?>" class="flex">
            <img class="max-w-full" src="<?php echo e(asset($telegram['image'] ?? '')); ?>" alt="">
        </a>
        <a href="<?php echo e($instagram['url'] ?? ''); ?>" class="flex">
            <img class="max-w-full" src="<?php echo e(asset($instagram['image'] ?? '')); ?>" alt="">
        </a>
    </div>
</section><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/homes/social.blade.php ENDPATH**/ ?>