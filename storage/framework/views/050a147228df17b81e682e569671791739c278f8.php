<head>
    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#3D42DF">
    <link rel="icon" href="<?php echo e(asset('site/images/logo-icon.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('site/fonts/icons/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('site/library/swiper/swiper.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('site/library/easytab/easytab.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('site/library/plyr/plyr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('site/css/dist.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <?php echo $__env->yieldContent('style'); ?>
</head><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/components/layouts/head.blade.php ENDPATH**/ ?>