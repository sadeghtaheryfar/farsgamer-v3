<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('l5awTNh')) {
    $componentId = $_instance->getRenderedChildComponentId('l5awTNh');
    $componentTag = $_instance->getRenderedChildComponentTagName('l5awTNh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l5awTNh');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('l5awTNh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('site.components.layouts.top-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main id="main">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo e(TawkTo::widgetCode('5f2946912da87279037e4523')); ?>

</body>
</html><?php /**PATH /home/farsgam1/domains/farsgamer.com/farsgamer/resources/views/site/layouts/site.blade.php ENDPATH**/ ?>