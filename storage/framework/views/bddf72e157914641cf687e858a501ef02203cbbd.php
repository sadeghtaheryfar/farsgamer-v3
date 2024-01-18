<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('r1Ln6S3')) {
    $componentId = $_instance->getRenderedChildComponentId('r1Ln6S3');
    $componentTag = $_instance->getRenderedChildComponentTagName('r1Ln6S3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('r1Ln6S3');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('r1Ln6S3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('WG8As0X')) {
    $componentId = $_instance->getRenderedChildComponentId('WG8As0X');
    $componentTag = $_instance->getRenderedChildComponentTagName('WG8As0X');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('WG8As0X');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('WG8As0X', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<main id="main" class="main--dashboard">
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('site.components.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<?php echo $__env->make('site.components.layouts.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo e(TawkTo::widgetCode('5f2946912da87279037e4523')); ?>

</body>
</html><?php /**PATH C:\Users\Asian\Documents\GitHub\farsgamer-v3\resources\views/site/layouts/dashboard.blade.php ENDPATH**/ ?>