<head>
    <meta charset="utf-8"/>

    
    <title>فارس گیمر</title>

    
    <meta name="description" content="<?php echo $__env->yieldContent('page_description', $page_description ?? ''); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <link rel="shortcut icon" href="<?php echo e(asset('admin/media/logos/favicon.ico')); ?>"/>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<?php if(auth()->user()->language == 'basic'): ?>
    
		<link href="<?php echo e(asset('admin/plugins/global/plugins.bundle.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('admin/plugins/custom/prismjs/prismjs.bundle.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('admin/css/style.bundle.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>

		
		<link href="<?php echo e(asset('admin/css/themes/layout/header/base/light.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('admin/css/themes/layout/header/menu/light.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('admin/css/themes/layout/brand/dark.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
		<link href="<?php echo e(asset('admin/css/themes/layout/aside/dark.rtl.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
		<link rel="icon" href="<?php echo e(asset('site/images/logo-icon.png')); ?>">

		<?php if(request()->routeIs(['partner.store.new.orders'])): ?>
			<link rel="stylesheet" href="<?php echo e(asset('site/fonts/icons/style.css?v=1.0.1')); ?>">
			<link rel="stylesheet" href="<?php echo e(asset('site/css/dist.css?v=1.0.1')); ?>">
		<?php endif; ?>		
		
	<?php else: ?>
	
    <link href="<?php echo e(asset('admin/plugins/global/plugins.bundle.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/style.bundle.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>

    
    <link href="<?php echo e(asset('admin/css/themes/layout/header/base/light.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/themes/layout/header/menu/light.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/themes/layout/brand/dark.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('admin/css/themes/layout/aside/dark.css?v=7.0.6')); ?>" rel="stylesheet" type="text/css"/>
	<?php endif; ?>
    <link href="<?php echo e(asset('admin/css/my-style.css')); ?>" rel="stylesheet" type="text/css"/>

    
    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('admin/plugins/custom/datepicker/persian-datepicker.min.css')); ?>"/>
    <?php echo $__env->yieldContent('styles'); ?>

    
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
	
</head><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/admin/components/head.blade.php ENDPATH**/ ?>