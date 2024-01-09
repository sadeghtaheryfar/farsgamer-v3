<!DOCTYPE html>
<html lang="fa" dir="rtl">

<?php echo $__env->make('site.components.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.header', [])->html();
} elseif ($_instance->childHasBeenRendered('bgErqlW')) {
    $componentId = $_instance->getRenderedChildComponentId('bgErqlW');
    $componentTag = $_instance->getRenderedChildComponentTagName('bgErqlW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bgErqlW');
} else {
    $response = \Livewire\Livewire::mount('site.header', []);
    $html = $response->html();
    $_instance->logRenderedChild('bgErqlW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('site.sidebar', [])->html();
} elseif ($_instance->childHasBeenRendered('NXEwKjD')) {
    $componentId = $_instance->getRenderedChildComponentId('NXEwKjD');
    $componentTag = $_instance->getRenderedChildComponentTagName('NXEwKjD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NXEwKjD');
} else {
    $response = \Livewire\Livewire::mount('site.sidebar', []);
    $html = $response->html();
    $_instance->logRenderedChild('NXEwKjD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
</html><?php /**PATH /home/fortnit2/domains/farsgamer.com/farsgamer/resources/views/site/layouts/dashboard.blade.php ENDPATH**/ ?>