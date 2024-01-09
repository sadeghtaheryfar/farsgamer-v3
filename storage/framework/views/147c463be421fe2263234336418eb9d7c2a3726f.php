<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" direction="rtl" dir="rtl" style="direction: rtl">
<?php echo $__env->make('admin.components.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body id="kt_body" class="header-static header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

<?php echo $__env->make('admin.components.header-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">

        <?php echo $__env->make('admin.components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="kt_wrapper" class="d-flex flex-column flex-row-fluid wrapper">



            <div id="kt_content" class="d-flex flex-column flex-column-fluid">

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
</div>


<?php echo $__env->make('admin.components.scroll-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.components.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/admin/layouts/admin.blade.php ENDPATH**/ ?>