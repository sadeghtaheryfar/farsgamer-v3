<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body class="header-and-sidebar-fixed">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header2', [])->html();
} elseif ($_instance->childHasBeenRendered('PqTxHGQ')) {
    $componentId = $_instance->getRenderedChildComponentId('PqTxHGQ');
    $componentTag = $_instance->getRenderedChildComponentTagName('PqTxHGQ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PqTxHGQ');
} else {
    $response = \Livewire\Livewire::mount('site.header2', []);
    $html = $response->html();
    $_instance->logRenderedChild('PqTxHGQ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar2', [])->html();
} elseif ($_instance->childHasBeenRendered('VnTkrLk')) {
    $componentId = $_instance->getRenderedChildComponentId('VnTkrLk');
    $componentTag = $_instance->getRenderedChildComponentTagName('VnTkrLk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VnTkrLk');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar2', []);
    $html = $response->html();
    $_instance->logRenderedChild('VnTkrLk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo $__env->make('site.components.layouts.top-alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main id="main2">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo e(TawkTo::widgetCode('5f2946912da87279037e4523')); ?>

</body>
</html><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/layouts/site2.blade.php ENDPATH**/ ?>